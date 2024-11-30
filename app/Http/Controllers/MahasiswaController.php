<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MataKuliah;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard');
    }

    public function showIRS()
    {
        $mataKuliah = MataKuliah::all(); 
        return view('mahasiswa.irs', compact('mataKuliah'));
    }

    public function showRegistrasi()
    {
        return view('mahasiswa.registrasi'); 
    }

    public function submitRegistrasi(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswa,nim',
            'semester' => 'required|integer',
        ]);

        Mahasiswa::create([
            'nama_mahasiswa' => $validated['nama'],
            'nim' => $validated['nim'],
            'semester' => $validated['semester'],
            'status' => 'Aktif',
        ]);

        return redirect()->route('mahasiswa.dashboard')->with('success', 'Registrasi berhasil!');
    }

    public function submitIRS(Request $request)
    {
        $validated = $request->validate([
            'mata_kuliah' => 'required|array',
            'mata_kuliah.*' => 'exists:mata_kuliah,id',
        ]);

        foreach ($validated['mata_kuliah'] as $mkId) {
            IRS::create([
                'nim' => auth()->user()->nim,
                'kode_mk' => $mkId,
                'semester' => 5, // Contoh, sesuaikan dengan input sebenarnya
                'jmlsks' => MataKuliah::find($mkId)->sks,
                'isverified' => false,
            ]);
        }

        return redirect()->route('mahasiswa.irs')->with('success', 'IRS berhasil disimpan!');
    }
}
