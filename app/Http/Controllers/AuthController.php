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
        // Validasi kredensial login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah kredensial cocok
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Jika peran adalah 'Dosen', arahkan ke halaman pemilihan peran
            if ($user->role === 'Dosen') {
                return redirect()->route('select.role'); 
            }

            // Arahkan berdasarkan peran pengguna
            return match ($user->role) {
                'Mahasiswa' => redirect()->intended('/mahasiswa/dashboard'),
                'BagianAkademik' => redirect()->intended('/bagianAkademik/dashboard'),
                default => redirect()->route('home'),
            };
        }

        // Jika login gagal
        return back()->withErrors(['email' => 'Login gagal! Periksa email dan kata sandi Anda.'])->withInput();
    }

    public function selectRole()
    {
        $user = Auth::user();

        if ($user && $user->role === 'Dosen') {
            $roles = ['pembimbingAkademik']; 

            if ($user->dosen->role === 'Dekan') {
                $roles[] = 'dekan';
            }
            if ($user->dosen->role === 'Kaprodi') {
                $roles[] = 'kaprodi';
            }

            // Kirimkan data peran ke tampilan untuk pemilihan peran
            return view('auth.select_role', compact('roles'));
        }

        // Jika bukan Dosen, arahkan ke halaman utama
        return redirect()->route('home');
    }

    public function processRole(Request $request)
    {
        // Validasi peran yang dipilih
        $request->validate([
            'role' => 'required|in:dekan,pembimbingAkademik,kaprodi',
        ]);

        // Arahkan berdasarkan peran yang dipilih
        return match ($request->role) {
            'dekan' => redirect()->route('dekan.dashboard'),
            'pembimbingAkademik' => redirect()->route('pembimbingAkademik.dashboard'),
            'kaprodi' => redirect()->route('kaprodi.dashboard'),
            default => redirect()->route('home'),
        };
    }

    public function logout(Request $request)
    {
        // Logout dan hapus sesi
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Anda telah logout.');
    }
}
