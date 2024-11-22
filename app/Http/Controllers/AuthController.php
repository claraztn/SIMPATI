<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\BagianAkademik;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login', [
            'title' => 'auth.login'
        ]); 
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            switch ($user->role) {
                case 'Mahasiswa':
                    return redirect()->intended('/mahasiswa/dashboard');
                case 'BagianAkademik':
                    return redirect()->intended('/pembimbingAkademik/dashboard');
                case 'Dosen':
                    return redirect()->intended('/dosen/dashboard');
                default:
                    return redirect()->route('home');
            }
        }

        return back()->withErrors([
            'email' => 'Login gagal! Periksa username dan password Anda.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah logout.');
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
