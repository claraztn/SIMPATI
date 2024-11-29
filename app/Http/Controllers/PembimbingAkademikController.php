<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IRS;  
use App\Models\Jadwal;  

class PembimbingAkademikController extends Controller
{

    public function index()
    {

        return view('pembimbingAkademik.dashboard');
    }

    public function irsMahasiswa()
    {
        $mahasiswa = IRS::all();  
        return view('pembimbingAkademik.irs', compact('mahasiswa'));  // Kirim data ke view
    }

    // Menampilkan menu jadwal mengajar
    public function jadwalMengajar()
    {
        $jadwal = Jadwal::where('pembimbing_id', auth()->user()->id)->get();  // Ambil jadwal mengajar berdasarkan pembimbing
        return view('pembimbingAkademik.jadwal', compact('jadwal'));  // Kirim data ke view
    }
}
