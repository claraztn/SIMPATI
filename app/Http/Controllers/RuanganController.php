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
        // Mengambil data ruangan berdasarkan gedung
        $ruangan = DB::table('ruangan')->where('gedung', $gedung)->get();
        
        return response()->json($ruangan);
    }

    public function index()
    {
        $ketersediaanRuangs = KetersediaanRuang::all(); // Ambil semua data ketersediaan ruang
        return view('ketersediaan_ruang', compact('ketersediaanRuangs')); // Kirim data ke view
    }
}
