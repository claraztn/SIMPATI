<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Irs;
use App\Models\MataKuliah;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Dosen;
use App\Models\DosenMataKuliah;

class IrsController extends Controller
{
    /**
     * Menampilkan halaman IRS mahasiswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil data mata kuliah yang tersedia dan tampilkan di view
        $mataKuliah = MataKuliah::all();
        $jadwal = Jadwal::all();
        
        return view('irs.index', compact('mataKuliah', 'jadwal'));
    }

    /**
     * Menyimpan data IRS mahasiswa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim
        $validated = $request->validate([
            'nim' => 'required|string',
            'semester' => 'nullable|string',
            'jmlsks' => 'nullable|integer',
            'scansks' => 'nullable|string',
            'isverified' => 'boolean',
            'kode_kelas' => 'required|string',
        ]);

        // Simpan data IRS baru
        $irs = new Irs();
        $irs->nim = $validated['nim'];
        $irs->semester = $validated['semester'];
        $irs->jmlsks = $validated['jmlsks'];
        $irs->scansks = $validated['scansks'];
        $irs->isverified = $validated['isverified'] ?? false;
        $irs->kode_kelas = $validated['kode_kelas'];
        $irs->save();

        // Redirect setelah berhasil
        return redirect()->route('mahasiswa.irs')->with('success', 'IRS berhasil disimpan!');
    }

    /**
     * Menampilkan detail IRS berdasarkan NIM atau kode_kelas.
     *
     * @param  string  $nim
     * @param  string  $kode_kelas
     * @return \Illuminate\Http\Response
     */
    public function show($nim, $kode_kelas)
    {
        // Ambil data IRS berdasarkan NIM dan kode_kelas
        $irs = Irs::where('nim', $nim)->where('kode_kelas', $kode_kelas)->first();

        // Jika data IRS tidak ditemukan, tampilkan error
        if (!$irs) {
            return redirect()->route('mahasiswa.irs')->with('error', 'IRS tidak ditemukan.');
        }

        // Ambil data mata kuliah dan jadwal untuk ditampilkan di detail IRS
        $mataKuliah = MataKuliah::where('kode_mk', $irs->kode_mk)->first();
        $jadwal = Jadwal::where('kode_kelas', $irs->kode_kelas)->get();
        
        return view('irs.show', compact('irs', 'mataKuliah', 'jadwal'));
    }

    /**
     * Mengubah status IRS (misal verifikasi).
     *
     * @param  string  $nim
     * @param  string  $kode_kelas
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $nim, $kode_kelas)
    {
        // Temukan IRS berdasarkan NIM dan kode_kelas
        $irs = Irs::where('nim', $nim)->where('kode_kelas', $kode_kelas)->first();

        if (!$irs) {
            return redirect()->route('mahasiswa.irs')->with('error', 'IRS tidak ditemukan.');
        }

        // Perbarui status IRS
        $irs->isverified = $request->input('isverified', false);
        $irs->save();

        // Redirect dengan pesan sukses
        return redirect()->route('mahasiswa.irs')->with('success', 'Status IRS berhasil diperbarui!');
    }
}
