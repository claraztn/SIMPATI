<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Ruangan;
use App\Models\MataKuliah;
use App\Models\DosenMataKuliah;
use App\Models\Jadwal;

class KaprodiController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('mataKuliah')->get();
        $ruangan = Ruangan::where('status', 'approved')->get(); 
        return view('kaprodi.dashboard', compact('kelas','ruangan'));
    }

    public function aturJadwal()
    {   
        $kelas = Kelas::with('mataKuliah', 'jadwal','jadwal.ruangan','dosenMataKuliah.dosen')->get();
        $mataKuliah = MataKuliah::all();
        $ruangan = Ruangan::where('status', 'approved')->get();
        $dosenMataKuliah = DosenMataKuliah::with('dosen')->get();

        return view('kaprodi.atur_jadwal', compact('kelas', 'mataKuliah', 'ruangan', 'dosenMataKuliah'));
    }


    public function storeJadwal(Request $request)
    {
        $request->validate([
            'kode_kelas' => 'required|exists:kelas,kode_kelas',
            'id_ruang' => 'required|exists:ruangan,id_ruang',
            'hari' => 'required',
            'jam_mulai' => 'required|date_format:H:i',
            'sks' => 'required|integer|min:1',
        ]);

        // Menyimpan jadwal
        Jadwal::create([
            'kode_kelas' => $request->kode_kelas,
            'id_ruang' => $request->id_ruang,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'sks' => $request->sks,
            'status' => 'approved', 
        ]);

        return redirect()->route('kaprodi.atur_jadwal')->with('success', 'Jadwal berhasil disimpan!');
    }

    public function waitingList()
    {
        // Logika untuk waiting list
        return view('waiting_list');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
