<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\DosenMataKuliah;
use Illuminate\Http\Request;
use App\Models\IRS;
use App\Models\IrsItemMahasiswa;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\User;

class PembimbingAkademikController extends Controller
{

    public function index()
    {

        return view('pembimbingAkademik.dashboard');
    }

    // public function irsMahasiswa()
    // {
    //     $mahasiswa = IRS::all();
    //     return view('pembimbingAkademik.irs', compact('mahasiswa'));  // Kirim data ke view
    // }

    function irsMahasiswa()
    {
        // ambil id dosen yg sdgn login
        $userId = auth()->user()->id;

        $dataDosenLogin = Dosen::where('id_user', $userId)->first();
        // dd($dataDosenLogin);

        // ambil data mhasiswa yg dospem nya beliau yg sedang login
        $mahasiswaRelated = Mahasiswa::with(['IRS' => function ($query) {
            $query->latest('created_at');
        }, 'statusAkademik'])->where('dosen_wali', $dataDosenLogin->nip)->get();


        // dd($mahasiswaRelated);

        return view('pembimbingAkademik.irs_mahasiswa', compact('mahasiswaRelated'));
    }

    function irsDetail($irs_id)
    {

        $getIRSDetail = IrsItemMahasiswa::where('id_irs', $irs_id)->get();

        $nim = $getIRSDetail->pluck('nim')->first();

        // ambil jmlsks yg terambil pd tabel IRS
        $idIrs = $getIRSDetail->pluck('id_irs')->first();
        $jmlsks = IRS::where('id', $idIrs)->pluck('jmlsks')->last();

        $statusVerifikasi = IRS::where('id', $idIrs)->pluck('isverified')->last();

        // dd($statusVerifikasi);

        // ambil informasi mahasiswa dr tabel mhs brdasarkan nim pd entitas di IRSItemMhsiswa
        $infoMahasiswa = Mahasiswa::with('StatusAkademik')->where('nim', $nim)->first();

        // ambil informasi hari jam dan ruangan matkul trsebut dr tabel jadwal
        // $getJadwalMatkul = Jadwal::where('kode_mk', )

        return view('pembimbingAkademik.irs_detail', compact('getIRSDetail', 'infoMahasiswa', 'idIrs', 'jmlsks', 'statusVerifikasi'));
    }

    function verifikasiIrs(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:irs,id',
            'isVerified' => 'required|boolean'
        ]);

        $irs = IRS::find($request->id);

        $irs->isverified = $request->isVerified;
        $irs->save();

        // Return a JSON response
        return response()->json(['message' => 'IRS updated successfully']);
    }



    // Menampilkan menu jadwal mengajar
    public function jadwalMengajar()
    {
        $userId = auth()->user()->id;
        $infoDosen = Dosen::where('id_user', $userId)->first();
        $mkRelated = DosenMataKuliah::where('nip', $infoDosen->nip)->get();

        // $dataDosen
        // dd($mataKuliahRelated);
        // $jadwal = Jadwal::where('pembimbing_id', auth()->user()->id)->get();
        return view('pembimbingAkademik.jadwal_mengajar', compact('userId', 'infoDosen', 'mkRelated'));  // Kirim data ke view
    }
}
