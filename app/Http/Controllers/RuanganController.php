<?php

namespace App\Http\Controllers;

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
        $prodi = ProgramStudi::all();  // Fetch program studi (prodi)
        return view('bagianAkademik.manajemen_ruang', compact('ruangan', 'prodi')); // Pass both variables to the view
    }
    

    public function getRuangByProdi(Request $request)
    {
        $prodi = $request->input('prodi');
        if (!$prodi) {
            return response()->json(['error' => 'Prodi tidak valid'], 400);
        }
        $ruangan = Ruangan::where('id_prodi', $prodi)->get();    
        return response()->json($ruangan);
    }
    

    public function getRuanganByGedung(Request $request)
    {
        $gedung = $request->get('gedung');
        $ruangs = Ruangan::where('gedung', $gedung)->get(['nama_ruang', 'kapasitas_ruang']);
        return response()->json($ruangs);
    }    

    /**
     * Menampilkan halaman ketersediaan ruang.
     */
    public function index()
    {
        $ruangan = Ruangan::all();
        $prodi = ProgramStudi::all(); 
        return view('ketersediaan_ruang', compact('ruangan', 'prodi'));
    }

    /**
     * Mengatur kapasitas ruangan.
     */
    public function aturKapasitas(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'prodi' => 'required|exists:prodi,id_prodi',  // Validasi untuk prodi
            'gedung' => 'required|string',  // Validasi untuk gedung
            'namaRuang' => 'required|string|exists:ruangan,nama_ruang',
            'kapasitas' => 'required|integer|min:1',
        ]);
    
        // Cari ruangan berdasarkan nama ruang dan prodi
        $ruangan = Ruangan::where('nama_ruang', $validated['namaRuang'])
                          ->where('id_prodi', $validated['prodi'])
                          ->firstOrFail();
    
        // Update kapasitas ruangan
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
