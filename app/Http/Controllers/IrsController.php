<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class IRSController extends Controller
{
    function index(): View
    {
        return view('page.irs.index');
    }

    function show(): View
    {
        return view('page.irs.show');
    }

    function showApproved(): View
    {
        return view('page.irs.showApproved');
    }
}
