<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Ruangan;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Models\DosenMataKuliah;
use App\Models\ProgramStudi;
use Illuminate\Support\Facades\DB;

class KaprodiController extends Controller
{
    public function index()
    {
        // $kelas = Kelas::with('mataKuliah')->get();
        $jadwals = Jadwal::with('kelas')->get();
        $ruangan = Ruangan::where('status', 'approved')->get();
        return view('kaprodi.dashboard', compact('jadwals', 'ruangan'));
    }

    public function aturJadwal()
    {
        // $kelas = Kelas::with('mataKuliah', 'jadwal', 'jadwal.ruangan', 'dosenMataKuliah.dosen')->get();
        $mataKuliah = MataKuliah::all();
        $jadwals = Jadwal::with('kelas', 'dosens')->get();
        $ruangan = Ruangan::where('status', 'approved')->get();
        $dosen = Dosen::all();

        $dosenArray = $dosen->toArray(); // untk ktika tambah dosen


        return view('kaprodi.atur_jadwal', compact('mataKuliah', 'jadwals', 'ruangan', 'dosen', 'dosenArray'));
    }

    public function aturMatakuliah()
    {
        $mataKuliah = MataKuliah::orderBy('created_at', 'DESC')->get();

        $prodi = ProgramStudi::all();

        return view('kaprodi.atur_matakuliah', compact('mataKuliah', 'prodi'));
    }

    public function listMatakuliah()
    {
        $mataKuliah = MataKuliah::orderBy('created_at', 'DESC')->get();

        $prodi = ProgramStudi::all();

        return view('kaprodi.list_matakuliah', compact('mataKuliah', 'prodi'));
    }

    public function updateMatakuliah(Request $request, $kode_mk)
    {
        $validated = $request->validate([
            'kode_mk' => 'required|string|max:10',
            'nama_mk' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:8',
            'sks' => 'required|integer|min:1|max:4',
            'sifat' => 'required|string|in:Wajib,Pilihan',
            'id_prodi' => 'required',
        ]);


        // dd($request->all());
        $mataKuliah = MataKuliah::findOrFail($kode_mk);
        $mataKuliah->update($validated);

        return redirect()->back()->with('success', 'Mata kuliah berhasil diperbarui.');
    }


    public function deleteMatakuliah($kode_mk)
    {
        $mataKuliah = MataKuliah::findOrFail($kode_mk);
        $mkCount = Jadwal::where('kode_mk', $kode_mk)->count();

        if ($mkCount > 0) {
            return response()->json([
                'status' => 'error',
                'message' => "Mata kuliah {$mataKuliah->nama_mk} tidak dapat dihapus karena sudah terpakai di jadwal!"
            ], 400);
        }

        $mataKuliah->delete();

        return redirect()->back()->with('success', "Ruang {$mataKuliah->nama_mk} berhasil dihapus!");
    }


    public function storeJadwal(Request $request)
    {
        $request->validate([
            'kode_kelas' => 'required|exists:kelas,kode_kelas',
            'kode_mk' => 'required|exists:mata_kuliah,kode_mk',
            'hari' => 'required|string',
            'id_ruang' => 'required|exists:ruangan,id_ruang',
            'jam_mulai' => 'required|date_format:H:i',

            'dosen_pengampu' => 'required|array',
            'dosen_pengampu.*' => 'required|exists:dosen,nip',
        ]);

        // cek durasi matkul berjalan
        $jamMulai = \Carbon\Carbon::createFromFormat('H:i', $request->jam_mulai);
        $sks = $request->sks;

        $durasiMenit = $sks * 50; // 1 SKS = 50 menit
        $jamSelesai = $jamMulai->copy()->addMinutes($durasiMenit)->format('H:i:s');
        $jamMulai = $jamMulai->format('H:i:s'); // formt di db pake detik soalny

        // dd($jamSelesai);

        // cek untuk kondisi apakah jadwalny ada yg bentrok atau tdk
        $cekJadwal = Jadwal::where('hari', $request->hari) // hari yg sama
            ->where('id_ruang', $request->id_ruang) // ruangan yg sama
            ->where(function ($query) use ($jamMulai, $jamSelesai) {
                $query->where('jam_mulai', '<', $jamSelesai) // jdwl yang ada dimulai sebelum jdwl baru selesai
                    ->where('jam_selesai', '>', $jamMulai); // jdwl yang ada selesai setelah jdwl baru dimulai
            })
            ->exists();


        // dd($cekJadwal);
        if ($cekJadwal) {
            return redirect()->route('kaprodi.atur-jadwal')->with('error', 'Gagal menyimpan.
            Jadwal berbenturan dengan jadwal lain! Silahkan mengatur ulang kembali');
        }

        $jadwal = Jadwal::create([
            'kode_kelas' => $request->kode_kelas,
            'kode_mk' => $request->kode_mk,
            'hari' => $request->hari,
            'id_ruang' => $request->id_ruang,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $jamSelesai,
            'sks' => $request->sks,
            'status' => 'pending',
        ]);


        foreach ($request->dosen_pengampu as $nip) {
            DB::table('dosen_mata_kuliah')->insert([
                'kode_mk' => $request->kode_mk,
                'nip' => $nip,
                'id_jadwal' => $jadwal->id_jadwal,
                'tahun' => '2023',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('kaprodi.atur-jadwal')->with('success', 'Jadwal berhasil disimpan!');
    }

    public function storeMatakuliah(Request $request)
    {
        $validatedData = $request->validate([
            'kode_mk' => 'required|string|max:10|unique:mata_kuliah,kode_mk',
            'nama_mk' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:8',
            'sks' => 'required|integer|min:1|max:4',
            'sifat' => 'required|in:Wajib,Pilihan',
            'id_prodi' => 'required|exists:program_studi,id_prodi',
        ]);

        // dd($request->all());

        MataKuliah::create([
            'kode_mk' => $validatedData['kode_mk'],
            'nama_mk' => $validatedData['nama_mk'],
            'semester' => $validatedData['semester'],
            'sks' => $validatedData['sks'],
            'sifat' => $validatedData['sifat'],
            'id_prodi' => $validatedData['id_prodi'],
        ]);

        return redirect()->route('kaprodi.atur-matakuliah')->with('success', 'Data mata kuliah berhasil ditambahkan!');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
