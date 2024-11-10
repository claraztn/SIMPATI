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
        // Validate the request
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            // Attempt to authenticate
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // If authentication is successful, redirect to the dashboard
                return redirect()->route('dashboard2');
            } else {
                // If authentication fails, redirect back with an error message
                return redirect()->route('account.login')->with('error', 'Either email or password is incorrect!');
            } 
        } else {
            // If validation fails, redirect back with errors
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }
}
