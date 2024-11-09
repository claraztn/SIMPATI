<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use App\Models\KetersediaanRuang;
use Illuminate\Support\Facades\DB;

class RuanganController extends Controller
{
    public function showManajemenRuang()
    {
        // Mengambil semua data ruangan
        $ruangan = DB::table('ruangan')->get();
        
        // Mengirim data ruangan ke view
        return view('manajemen_ruang', compact('ruangan'));
    }

    public function getRuangByGedung(Request $request)
    {
        $gedung = $request->input('gedung');
        
        // Mengambil nama ruangan dan kapasitas berdasarkan gedung
        $ruangan = DB::table('ruangan')
            ->where('gedung', $gedung)
            ->get(['id_ruang', 'nama_ruang', 'kapasitas_ruang']);
        
        // Pastikan data yang dikirim adalah format JSON
        return response()->json($ruangan);
    }
    
    
    

    public function index()
    {
        $ketersediaanRuangs = KetersediaanRuang::all(); // Ambil semua data ketersediaan ruang
        return view('ketersediaan_ruang', compact('ketersediaanRuangs')); // Kirim data ke view
    }

    public function store(Request $request) {
        Ruangan::create([
            'id_ruang'=>$request->id,
            'gedung'=>$request->gedung,
            'nama_ruang'=>$request->nama_ruang,
            'kapasitas'=>$request->kapasitas,
        ]);
        return redirect('ruangan')->with('toast_success', 'Data Berhasil Tersimpan');
    }

    public function update(Request $request)
    {
        $ruangan = DB::table('ruangan')
            ->where('id_ruang', $request->namaRuang) // Menggunakan id_ruang untuk lebih akurat
            ->update(['kapasitas' => $request->kapasitas]);
    
        // Redirect ke manajemen ruang setelah update
        return redirect()->route('manajemen_ruang')->with('success', 'Data ruang berhasil diperbarui');
    }
    
}
