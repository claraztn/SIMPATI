<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Jadwal;

class DekanController extends Controller
{
    public function index()
    {
        return view('dekan.dashboard');
        // $ruanganVerified = Ruangan::where('status', 'approved')->count();
        // $ruanganPending = Ruangan::where('status', 'pending')->count();
    
        // // Mengambil jumlah jadwal yang sudah diverifikasi dan yang belum diverifikasi
        // $jadwalVerified = Jadwal::where('status', 'approved')->count();
        // $jadwalPending = Jadwal::where('status', 'pending')->count();
    }

    public function verifikasiRuangan()
    {
        $ruanganPending = Ruangan::where('status', 'pending')->get(); // Data ruangan menunggu verifikasi
        $ruanganApproved = Ruangan::where('status', 'approved')->get(); // Data ruangan yang disetujui
        $ruanganRejected = Ruangan::where('status', 'rejected')->get(); // Data ruangan yang ditolak

        return view('dekan.verifikasi_ruangan', compact('ruanganPending', 'ruanganApproved', 'ruanganRejected'));
    }

    public function verifikasiJadwal()
    {
        $jadwalPending = Jadwal::where('status', 'pending')->get(); // Mengambil data jadwal dengan status 'pending'
        $jadwalApproved = Jadwal::where('status', 'approved')->get(); // Mengambil data jadwal dengan status 'approved'

        return view('dekan.verifikasi_jadwal', compact('jadwalPending', 'jadwalApproved'));
    }

    public function verifikasiRuang($id_ruang, Request $request)
    {
        $ruangan = Ruangan::find($id_ruang); // Mencari ruangan berdasarkan ID

        if (!$ruangan) {
            return redirect()->route('verifikasi.ruangan')->with('error', 'Ruangan tidak ditemukan.');
        }

        // Mengambil action yang dipilih (approve atau reject)
        $action = $request->input('action');
        if ($action == 'approve') {
            $ruangan->status = 'approved';
        } elseif ($action == 'reject') {
            $ruangan->status = 'rejected';
        }

        $ruangan->save(); // Menyimpan perubahan status ruangan

        return redirect()->route('verifikasi.ruangan')->with('success', 'Status ruangan berhasil diperbarui.');
    }
}
