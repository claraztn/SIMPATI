<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Menampilkan halaman manajemen ruangan.
     */
    public function showManajemenRuang()
    {
        $ruangan = Ruangan::all();
        return view('manajemen_ruang', compact('ruangan'));
    }

    /**
     * Mengambil data ruangan berdasarkan gedung.
     */
    public function getRuangByGedung(Request $request)
    {
        $gedung = $request->input('gedung');
        
        if (!$gedung) {
            return response()->json(['error' => 'Gedung tidak valid'], 400);
        }

        $ruangan = Ruangan::where('gedung', $gedung)->get();
        return response()->json($ruangan);
    }

    /**
     * Menampilkan halaman ketersediaan ruang.
     */
    public function index()
    {
        $ruangan = Ruangan::all();
        return view('ketersediaan_ruang', compact('ruangan'));
    }

    /**
     * Mengatur kapasitas ruangan.
     */
    public function aturKapasitas(Request $request)
    {
        $validated = $request->validate([
            'namaRuang' => 'required|string|exists:ruangan,nama_ruang',
            'kapasitas' => 'required|integer|min:1',
        ]);

        $ruangan = Ruangan::where('nama_ruang', $validated['namaRuang'])->firstOrFail();
        $ruangan->update(['kapasitas' => $validated['kapasitas']]);

        return redirect()->route('ketersediaan_ruang')->with('success', "Kapasitas ruang {$ruangan->nama_ruang} berhasil diperbarui!");
    }

    /**
     * Menghapus kapasitas ruangan.
     */
    public function hapus($id_ruang)
    {
        $ruangan = Ruangan::findOrFail($id_ruang);
        $ruangan->update(['kapasitas' => null]);

        return redirect()->route('ketersediaan_ruang')->with('success', "Kapasitas ruang {$ruangan->nama_ruang} berhasil dihapus!");
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
