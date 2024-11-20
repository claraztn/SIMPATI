<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Ruangan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Tampilkan daftar jadwal.
     */
    public function index()
    {
        $jadwal = Jadwal::with(['ruangan', 'kelas'])->get(); // Mengambil semua data jadwal dengan relasi
        return view('jadwal.index', compact('jadwal')); // Kirim data ke view
    }

    /**
     * Tampilkan formulir untuk menambahkan jadwal baru.
     */
    public function create()
    {
        $ruangan = Ruangan::all(); // Ambil semua ruangan
        $kelas = Kelas::all(); // Ambil semua kelas
        return view('jadwal.create', compact('ruangan', 'kelas')); // Kirim data ke view
    }

    /**
     * Simpan data jadwal baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hari' => 'required|string',
            'id_ruang' => 'required|exists:ruangan,id_ruang',
            'id_kelas' => 'required|exists:kelas,id',
            'jam_mulai' => 'required|date_format:H:i',
            'sks' => 'required|integer|min:1',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        Jadwal::create($validated);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail jadwal tertentu.
     */
    public function show($id)
    {
        $jadwal = Jadwal::with(['ruangan', 'kelas'])->findOrFail($id);
        return view('jadwal.show', compact('jadwal'));
    }

    /**
     * Tampilkan formulir untuk mengedit jadwal.
     */
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $ruangan = Ruangan::all();
        $kelas = Kelas::all();
        return view('jadwal.edit', compact('jadwal', 'ruangan', 'kelas'));
    }

    /**
     * Perbarui data jadwal tertentu.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'hari' => 'required|string',
            'id_ruang' => 'required|exists:ruangan,id_ruang',
            'id_kelas' => 'required|exists:kelas,id',
            'jam_mulai' => 'required|date_format:H:i',
            'sks' => 'required|integer|min:1',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($validated);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Hapus data jadwal tertentu.
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }

    /**
     * Verifikasi jadwal (Setujui atau Tolak).
     */
    public function verify(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        if ($request->action === 'approve') {
            $jadwal->update(['status' => 'approved']);
            $message = 'Jadwal berhasil disetujui.';
        } elseif ($request->action === 'reject') {
            $jadwal->update(['status' => 'rejected']);
            $message = 'Jadwal berhasil ditolak.';
        } else {
            return redirect()->back()->with('error', 'Aksi tidak valid.');
        }

        return redirect()->route('jadwal.index')->with('success', $message);
    }
}
