<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use App\Models\KetersediaanRuang;
use Illuminate\Support\Facades\DB;

class KetersediaanRuanganController extends Controller
{
    protected $ketersediaanRuang;

    public function __construct(KetersediaanRuang $ketersediaanRuang)
    {
        $this->ketersediaanRuang = $ketersediaanRuang;
    }

    // Metode untuk menampilkan semua data ketersediaan ruang
    public function index()
    {
        // Mengambil semua data ketersediaan ruang
        $ruangs = DB::table('ruangan')
                    ->whereNotNull('kapasitas')
                    ->get();

        // Mengirim data ke view ketersediaan_ruang
        return view('ketersediaan_ruang', compact('ruangs'));
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'gedung' => 'required|string',
            'namaRuang' => 'required|string',
            'kapasitas' => 'required|integer|min:1',
        ]);
    
        // Mencari data yang ingin diperbarui berdasarkan gedung dan nama ruang
        $ruang = KetersediaanRuang::where('gedung', $request->gedung)
                                  ->where('nama_ruang', $request->namaRuang)
                                  ->first();
    
        // Jika data ditemukan, update kapasitas
        if ($ruang) {
            $ruang->kapasitas_ruang = $request->kapasitas;
            $ruang->save();  // Menyimpan perubahan
            return redirect()->route('ketersediaan_ruang')->with('success', 'Kapasitas ruang berhasil diperbarui!');
        }
    
        // Jika data tidak ditemukan, buat entry baru
        $ruang = new KetersediaanRuang();
        $ruang->gedung = $request->gedung;
        $ruang->nama_ruang = $request->namaRuang;
        $ruang->kapasitas_ruang = $request->kapasitas;
        $ruang->save();
    
        return redirect()->route('ketersediaan_ruang')->with('success', 'Data ruang berhasil disimpan!');
    }    
}
