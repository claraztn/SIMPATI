<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class BagianAkademikController extends Controller
{
    public function index()
    {
        return view('bagianAkademik.dashboard'); 
    }

    public function manajemenRuang()
    {
        $ruangan = Ruangan::all();
        // Logika untuk manajemen ruang
        return view('bagianAkademik.manajemen_ruang');
    }
}
