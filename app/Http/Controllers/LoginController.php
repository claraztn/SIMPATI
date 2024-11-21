<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; // Pastikan Validator yang benar digunakan

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }
                                                                                                                 
    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('bagianAkademik/dashboard');
            } else {
                return redirect()->route('login')->with('error', 'Either email or password is incorrect!');
            } 

        } else {
            return redirect()->route('login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
