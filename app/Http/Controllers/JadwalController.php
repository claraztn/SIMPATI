<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class JadwalController extends Controller
{
    function index(): View
    {
        return view('page.jadwal.index');
    }
}
