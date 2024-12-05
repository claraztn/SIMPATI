<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\ProgramStudi;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DekanController extends Controller
{
    public function index()
    {
        return view('dekan.dashboard');
    }

    public function verifikasiRuangan()
    {
        $ruangans = Ruangan::select('id_prodi', DB::raw('COUNT(id_ruang) as jumlah_ruangan'))
            ->where('status', 'pending')
            ->groupBy('id_prodi')
            ->get();

        // dd($ruangans);

        $ruanganPending = Ruangan::with('programStudi')->where('status', 'pending')->get(); // Data ruangan menunggu verifikasi
        $ruanganApproved = Ruangan::with('programStudi')->where('status', 'approved')->get(); // Data ruangan yang disetujui
        $ruanganRejected = Ruangan::with('programStudi')->where('status', 'rejected')->get(); // Data ruangan yang ditolak

        return view('dekan.verifikasi_ruangan', compact('ruanganPending', 'ruanganApproved', 'ruanganRejected', 'ruangans'));
    }

    public function submitVerifRuangByProdi(Request $request, $id_prodi)
    {
        $action = $request->input('action');

        $ruangans = Ruangan::where('id_prodi', $id_prodi)
            ->where('status', 'pending')
            ->get();

        foreach ($ruangans as $ruangan) {
            if ($action == 'approve') {
                $ruangan->status = 'approved';
            }
            $ruangan->save();
        }

        $getName = ProgramStudi::where('id_prodi', $id_prodi)->pluck('nama_prodi')->first();

        return redirect()->route('verifikasi.ruangan')
            ->with('success', "Semua ruangan di Prodi {$getName} telah disetujui.");
    }


    public function verifikasiJadwal()
    {
        $jadwalPending = Jadwal::where('status', 'pending')->get(); // Mengambil data jadwal dengan status 'pending'
        $jadwalApproved = Jadwal::where('status', 'approved')->get(); // Mengambil data jadwal dengan status 'approved'

        return view('dekan.verifikasi_jadwal', compact('jadwalPending', 'jadwalApproved'));
    }

    function verifikasiJadwalSubmit($id_jadwal, Request $request)
    {
        $jadwal = Jadwal::find($id_jadwal);

        if (!$jadwal) {
            return redirect()->route('verifikasi.jadwal')->with('error', 'Jadwal tidak ditemukan.');
        }

        $action = $request->input('action');
        if ($action == 'approve') {
            $jadwal->status = 'approved';
        } elseif ($action == 'reject') {
            $jadwal->status = 'rejected';
        }

        $jadwal->save();

        return redirect()->route('verifikasi.jadwal')->with('success', 'Status jadwal berhasil diperbarui.');
    }

    public function verifikasiRuang($id_ruang, Request $request)
    {
        $ruangan = Ruangan::find($id_ruang); // Mencari ruangan berdasarkan ID

        if (!$ruangan) {
            return redirect()->route('verifikasi.ruangan')->with('error', 'Ruangan tidak ditemukan.');
        }

        $action = $request->input('action');
        if ($action == 'approve') {
            $ruangan->status = 'approved';
        } elseif ($action == 'reject') {
            $ruangan->status = 'rejected';
        }

        $ruangan->save();

        return redirect()->route('verifikasi.ruangan')->with('success', 'Status ruangan berhasil diperbarui.');
    }
}