<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BagianAkademikController extends Controller
{
    public function index()
    {
        return view('bagianAkademik.dashboard'); 
    }
}
