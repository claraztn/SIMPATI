<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IrsController extends Controller{

    public function BuatIrs()
    {
        $irs = DB::table('irs')->get();
        return view('buat_IRS', compact('irs'));
    }

}

