<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Ruangan;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Menampilkan halaman manajemen ruangan.
     */
    public function showManajemenRuang()
    {
        $ruangan = Ruangan::all();
        $prodi = ProgramStudi::where('id_fakultas', 1)->get();  // Mengambil data prodi untuk fakultas dengan ID 1
        return view('bagianAkademik.manajemen_ruang', compact('ruangan', 'prodi')); // mengirim data ruangan dan prodi
    }

    /**
     * Mengambil ruangan berdasarkan program studi yang dipilih.
     */
    public function getRuangByProdi(Request $request)
    {
        $prodi = $request->input('prodi'); // Mendapatkan ID prodi dari input request

        if (!$prodi) { // Jika tidak ada prodi yang dipilih, kirim error
            return response()->json(['error' => 'Prodi tidak valid'], 400);
        }

        $ruangan = Ruangan::where('id_prodi', $prodi)->get(); // Mengambil ruangan berdasarkan id_prodi
        return response()->json($ruangan); // Mengembalikan data ruangan dalam format JSON
    }

    /**
     * Mengambil ruangan berdasarkan gedung yang dipilih.
     */
    public function getRuanganByGedung(Request $request)
    {
        $gedung = $request->get('gedung'); // Mendapatkan nama gedung dari request

        if (!$gedung) {
            return response()->json(['error' => 'Gedung tidak valid'], 400);
        }

        $ruangs = Ruangan::where('gedung', $gedung)->get(['nama_ruang', 'kapasitas_ruang']);
        return response()->json($ruangs);
    }

    /**
     * Menampilkan halaman ketersediaan ruang/hasil pengisian ruang.
     */
    public function index()
    {
        $ruangan = Ruangan::all();
        $prodi = ProgramStudi::all();

        $ruangs = Ruangan::with('programStudi')->orderBy('created_at', 'desc')->get();

        return view('ketersediaan_ruang', compact('ruangan', 'prodi', 'ruangs'));
    }

    /**
     * Mengatur kapasitas ruangan.
     */
    public function aturKapasitas(Request $request)
    {
        $validated = $request->validate([ // Validasi input dari form
            'id_prodi' => 'required|exists:program_studi,id_prodi',
            'gedung' => 'required|string',
            'nama_ruang' => 'required|string',
            'kapasitas' => 'required|integer|min:1',
        ]);

        $prodi = ProgramStudi::find($validated['id_prodi']); // Mencari prodi berdasarkan id_prodi yang diterima
        $id_fakultas = $prodi->id_fakultas; // Mendapatkan id_fakultas dari prodi

         // Mengecek apakah sudah ada ruangan dengan nama yang sama di gedung yang sama
        $existRuangan = Ruangan::where('gedung', $validated['gedung'])
            ->where('nama_ruang', $validated['nama_ruang'])
            ->where(function ($query) use ($validated, $id_fakultas) {
                $query->where('id_fakultas', $id_fakultas)  // fakultas sama
                    ->where('id_prodi', '!=', $validated['id_prodi'])  // beda prodi
                    ->orWhere(function ($query) use ($validated) {
                        // OR kondisi:  jika ada ruangan yang sudah terdaftar untuk prodi yang sama
                        $query->where('id_prodi', $validated['id_prodi']);
                    });
            })
            ->first();

        if ($existRuangan) {
            return redirect()->back()->with('error', "Ruangan \"{$validated['nama_ruang']}\" sudah dibuat atau terdaftar untuk prodi lain!");
        }

        // Jika tidak ada ruangan yang konflik, buat ruangan baru
        Ruangan::create([
            'id_prodi' => $validated['id_prodi'],
            'id_fakultas' => $id_fakultas,
            'gedung' => $validated['gedung'],
            'nama_ruang' => $validated['nama_ruang'],
            'kapasitas' => $validated['kapasitas'],
        ]);

        return redirect()->route('ketersediaan_ruang')
            ->with('success', "Kapasitas ruangan \"{$validated['nama_ruang']}\" berhasil diperbarui!");
    }

    /**
     * Update data ruangan.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'gedung' => 'required|string|max:255',
            'nama_ruang' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
        ]);

        // Mencari ruangan berdasarkan ID
        $ruang = Ruangan::findOrFail($id);

        // Update data ruangan dengan data baru
        $ruang->gedung = $request->gedung;
        $ruang->nama_ruang = $request->nama_ruang;
        $ruang->kapasitas = $request->kapasitas;

        // Simpan perubahan
        $ruang->save();

        // Ubah status ruangan menjadi 'pending' setelah update
        Ruangan::where('id_ruang', $ruang->id_ruang)->update(['status' => 'pending',]);

        return redirect()->route('ketersediaan_ruang')->with('success', 'Data ruang berhasil diperbarui!');
    }

    /**
     * Menghapus data ruangan.
     */
    public function hapus($id_ruang)
    {
        $ruangan = Ruangan::findOrFail($id_ruang);
        $jadwalCount = Jadwal::where('id_ruang', $id_ruang)->count();

        if ($jadwalCount > 0) {
            return response()->json([
                'status' => 'error',
                'message' => "Ruang {$ruangan->nama_ruang} tidak dapat dihapus karena sudah terpakai di jadwal!"
            ], 400);
        }

        $ruangan->delete();

        return redirect()->route('ketersediaan_ruang')->with('success', "Ruang {$ruangan->nama_ruang} berhasil dihapus!");
    }

    /**
     * Menampilkan halaman verifikasi ruangan.
     */
    public function showVerifikasi()
    {
        $ruanganPending = Ruangan::where('status', 'pending')->get(); // Data ruangan yang menunggu verifikasi
        $ruanganApproved = Ruangan::where('status', 'approved')->get(); // Data ruangan yang sudah disetujui
        return view('ruangan.verifikasi', compact('ruanganPending', 'ruanganApproved'));
    }

    /**
     * Proses verifikasi ruangan (Setujui atau Tolak).
     */
    public function verify(Request $request, $id)
    {
        $ruangan = Ruangan::findOrFail($id);

        if ($request->action === 'approve') {
            $ruangan->update(['status' => 'approved']);
            $message = "Ruangan {$ruangan->nama_ruang} berhasil disetujui.";
        } elseif ($request->action === 'reject') {
            $ruangan->update(['status' => 'rejected']);
            $message = "Ruangan {$ruangan->nama_ruang} berhasil ditolak.";
        } else {
            return redirect()->back()->with('error', 'Aksi tidak valid.');
        }

        return redirect()->route('ruangan.verifikasi')->with('success', $message);
    }
}