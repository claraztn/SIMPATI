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
    public function index()
    {
        return view('auth.login', ['title' => 'Login']); 
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            
            if ($user->role === 'Dosen') {
                return redirect()->route('select.role'); // arahkan ke halaman pemilihan role
            }

            // Arahkan berdasarkan peran pengguna
            return match ($user->role) {
                'Mahasiswa' => redirect()->intended('/mahasiswa/dashboard'),
                'BagianAkademik' => redirect()->intended('/bagianAkademik/dashboard'),
                // 'Dekan' => redirect()->intended('/dekan/dashboard'),
                // 'Kaprodi' => redirect()->intended('/kaprodi/dashboard'),
                // 'PembimbingAkademik' => redirect()->intended('/pembimbingAkademik/dashboard'),
                default => redirect()->route('home')
            };
        }

        return back()->withErrors(['email' => 'Login gagal! Periksa email dan kata sandi Anda.'])->withInput();
    }

    
    public function selectRole()
    {
        $user = Auth::user();
        
        if ($user && $user->dosen) {
            // dd($user->dosen);
            $roles = [];

            // Tambahkan peran berdasarkan atribut role di model Dosen
            if ($user->dosen->role === 'Dekan') {
                $roles[] = 'dekan';
            }
            if ($user->dosen->role === 'PembimbingAkademik') {
                $roles[] = 'pembimbingAkademik';
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
            'role' => 'required|in:dekan,pembimbingAkademik,kaprodi',
        ]);
        
        // Arahkan berdasarkan peran yang dipilih
        return match ($request->role) {
            'dekan' => redirect()->route('dekan.dashboard'),
            'pembimbingAkademik' => redirect()->route('pembimbingAkademik.dashboard'),
            'kaprodi' => redirect()->route('kaprodi.dashboard'),
            default => redirect()->route('home')
        };
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Anda telah logout.');
    }
}
