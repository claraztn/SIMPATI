<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // Pastikan Validator yang benar digunakan

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function index() {
        return view('login');
    }

    // Proses autentikasi login
    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        if ($validator->passes()) {
            
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            } else {
                return redirect()->route('account.login')->with('Either email or password is incorrect!');
            } 
        } else {
            return redirect()->route('account.login')
            ->withInput()
            ->withErrors($validator);
        }
    }
}