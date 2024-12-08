<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class BagianAkademikController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::all()->count();

        $notApprov = Ruangan::where('status', 'pending')->count();
        $approved = Ruangan::where('status', 'approved')->count();
        $rejected = Ruangan::where('status', 'rejected')->count();

        return view('bagianAkademik.dashboard', compact('ruangan', 'notApprov', 'approved', 'rejected'));
    }

    public function manajemenRuang()
    {
        $ruangan = Ruangan::all();
        // Logika untuk manajemen ruang
        return view('bagianAkademik.manajemen_ruang');
    }
}