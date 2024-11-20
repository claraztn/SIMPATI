<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Arahkan pengguna berdasarkan role mereka
            if ($user->role === 'dosen') {
                return redirect()->route('select.role');
            }

            switch ($user->role) {
                case 'bagianAkademik':
                    return redirect()->route('bagianAkademik.dashboard');
                case 'mahasiswa':
                    return redirect()->route('mahasiswa.dashboard');
                default:
                    return redirect()->route('home');
            }
        }

        return back()->withErrors([
            'email' => 'Login failed. Please check your email and password.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have been logged out.');
    }

    public function selectRole()
    {
        $user = Auth::user();

        if ($user->dosen) {
            $roles = [];

            if ($user->dosen->role === 'Dekan') {
                $roles[] = 'dekan';
            }

            if ($user->dosen->role === 'Dosen Wali') {
                $roles[] = 'dosen_wali';
            }

            if ($user->dosen->role === 'Kaprodi') {
                $roles[] = 'kaprodi';
            }

            return view('auth.select_role', compact('roles'));
        }

        return redirect()->route('home');
    }

    public function processRole(Request $request)
    {
        $request->validate([
            'role' => 'required|in:dekan,dosen_wali,kaprodi',
        ]);

        switch ($request->role) {
            case 'dekan':
                return redirect()->route('dekan.dashboard');
            case 'dosen_wali':
                return redirect()->route('dosen_wali.dashboard');
            case 'kaprodi':
                return redirect()->route('kaprodi.dashboard');
            default:
                return redirect()->route('home');
        }
    }
}
