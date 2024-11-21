<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan; 
use App\Models\Jadwal; 

class DekanController extends Controller
{
    public function index()
    {
        return view('dekan.dashboard'); // Dashboard utama Dekan
    }

    public function verifikasiRuangan()
    {
        $ruanganPending = Ruangan::where('status', 'pending')->get(); // Data ruangan menunggu verifikasi
        $ruanganApproved = Ruangan::where('status', 'approved')->get(); // Data ruangan yang disetujui

        return view('dekan.verifikasi_ruangan', compact('ruanganPending', 'ruanganApproved')); // Kirim data ke view
    }

    public function verifikasiJadwal()
    {
        $jadwalPending = Jadwal::where('status', 'pending')->get(); // Mengambil data jadwal dengan status 'pending'
        $jadwalApproved = Jadwal::where('status', 'approved')->get(); // Mengambil data jadwal dengan status 'approved'

        return view('dekan.verifikasi_jadwal', compact('jadwalPending', 'jadwalApproved')); // Kirim data ke view
    }

    public function verifikasiRuang($id_ruang, Request $request)
    {
        $action = $request->input('action');
        $ruangan = Ruangan::find($id_ruang);

        if ($ruangan) {
            if ($action == 'approve') {
                $ruangan->status = 'approved';  // Mengubah status ruangan menjadi approved
            } elseif ($action == 'reject') {
                $ruangan->status = 'rejected';  // Mengubah status ruangan menjadi rejected
            }

            $ruangan->save();  // Menyimpan perubahan ke database
            return redirect()->route('verifikasi.ruangan')->with('success', 'Status ruangan telah diperbarui.');
        }

        return redirect()->route('verifikasi.ruangan')->with('error', 'Ruangan tidak ditemukan.');
    }
}
