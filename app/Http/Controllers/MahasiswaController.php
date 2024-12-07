<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\IRS;
use App\Models\Jadwal;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Models\StatusAkademik;
use App\Models\IrsItemMahasiswa;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        // get info mhs brdasarkan user yg saat ini sdg login
        $currentLogin = auth()->user()->id;
        $mahasiswa = Mahasiswa::where('id_user', $currentLogin)->first();
        // dd($getIdMhs);

        return view('mahasiswa.dashboard', compact('mahasiswa'));
    }

    public function showIRS(Request $request)
    {
        $currentLogin = auth()->user()->id;
        $mahasiswa = Mahasiswa::where('id_user', $currentLogin)->first();
        $statusAkademik = StatusAkademik::where('nim', $mahasiswa->nim)->first();

        $nim = $statusAkademik?->nim;
        $semester = $statusAkademik?->current_semester; // ambil posisiny skrg smstr brp
        $ipk = $statusAkademik?->ipk_komulatif;

        $batasSKS = $this->batasMaksimalSKS($nim, $semester, $ipk);

        // filter semester
        $semesterFilter = $request->get('semester', 's');  // default ke 's' jika tidak ada parameter semester

        // get semua jadwal yang sudah approved
        if ($semesterFilter != 's') {
            $jadwalMk = Jadwal::where('status', 'approved')
                ->whereHas('mataKuliah', function ($query) use ($semesterFilter) {
                    $query->where('semester', $semesterFilter);
                })
                ->get();
        } else {
            // if 's' dipilih, get semua jadwal tanpa filter semester
            $jadwalMk = Jadwal::where('status', 'approved')->get();
        }

        $irs = IRS::where('nim', $mahasiswa->nim)->where('semester', $semester)->first();

        return view('mahasiswa.irs', compact('jadwalMk', 'batasSKS', 'irs', 'semester'));
    }

    public function batasMaksimalSKS($nim, $semester, $ipk = null)
    {
        $maksimalSKS = 0;

        // htung berdasarkan semester
        if ($semester == 1 || $semester == 2) {
            // smester 1 dan 2 default 20 SKS
            $maksimalSKS = 20;

            if ($semester == 2 && $ipk !== null && $ipk < 2.0) {
                $maksimalSKS = 18;
            }
        } elseif ($semester >= 3) {
            // logika untuk semester 3 keatass
            if ($ipk !== null) {
                if ($ipk < 2.0) {
                    $maksimalSKS = 18;
                } elseif ($ipk >= 2.0 && $ipk <= 2.49) {
                    $maksimalSKS = 20;
                } elseif ($ipk >= 2.5 && $ipk <= 2.99) {
                    $maksimalSKS = 22;
                } elseif ($ipk >= 3.0 && $ipk <= 4.0) {
                    $maksimalSKS = 24;
                }
            } else {
                $maksimalSKS = 0;
            }
        }
        return $maksimalSKS;
    }

    public function submitIRS(Request $request)
    {
        $request->validate([
            'total_sks' => 'required|numeric',
            'kode_mk' => 'required|array',
            'kode_mk.*' => 'required|string',
        ], [
            'kode_mk.required' => 'Mata kuliah harus dipilih!',
        ]);


        $kodeMk = $request->kode_mk;
        $hari = $request->hari;
        $jamMulai = $request->jam_mulai;
        $jamSelesai = $request->jam_selesai;
        $ruang = $request->ruang;
        $jadwal = $request->id_jadwal;

        $currentLogin = auth()->user()->id; // get nim user yang sedang login
        $mahasiswa = Mahasiswa::where('id_user', $currentLogin)->first();
        $statusAkademik = StatusAkademik::where('nim', $mahasiswa->nim)->first();

        $nim = $statusAkademik->nim;
        $semester = $statusAkademik->current_semester;
        $totalSks = $request->total_sks;
        $kodeKelas = $mahasiswa->kode_kelas;

        // // pengecekan kalo ada bentrok jadwal,
        // // ini dicek lngsung bandingin dr request nya
        $count = count($kodeMk);
        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                if (isset($hari[$i], $jamMulai[$i], $jamSelesai[$i]) && isset($hari[$j], $jamMulai[$j], $jamSelesai[$j])) {
                    if ($hari[$i] == $hari[$j] && $this->cekRentangWaktu($jamMulai[$i], $jamSelesai[$i], $jamMulai[$j], $jamSelesai[$j])) {
                        return redirect()->back()->with('error', 'Terdapat Jadwal bertabrakan pada hari atau waktu yang dipilih. Periksa kembali dengan benar!');
                    }
                }
            }
        }

        // add irs, create dlu ke data tabel IRS
        $irs = IRS::create([
            'nim' => $nim,
            'semester' => $semester,
            'jmlsks' => $totalSks,
            'kode_kelas' => $kodeKelas,
            'isverified' => false,
        ]);

        foreach ($kodeMk as $index => $kodeMkItem) {
            IrsItemMahasiswa::create([
                'id_irs' => $irs->id,
                'id_jadwal' => $jadwal[$index],
                'nim' => $nim,
                'kode_mk' => $kodeMkItem,
                'hari' => $hari[$index],
                'jam_mulai' => $jamMulai[$index],
                'jam_selesai' => $jamSelesai[$index],
                'ruang' => $ruang[$index],
            ]);
        }

        return redirect()->back()->with('success', 'IRS berhasil diajukan!');
    }


    private function cekRentangWaktu($start1, $end1, $start2, $end2)
    {
        return ($start1 < $end2 && $end1 > $start2);
    }

    public function showDetail()
    {
        $mataKuliah = MataKuliah::all();

        return view('mahasiswa.detail_irs_khs', compact('mataKuliah'));
    }

    function unduhIRS()
    {
        $currentLogin = auth()->user()->id;

        $mahasiswa = Mahasiswa::where('id_user', $currentLogin)->first();
        if (!$mahasiswa) {
            return redirect()->route('home')->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $irs = IRS::where('nim', $mahasiswa->nim)->first();
        if (!$irs) {
            return redirect()->route('home')->with('error', 'IRS tidak ditemukan.');
        }

        $itemIRS = IrsItemMahasiswa::where('id_irs', $irs->id)->get();
        $dateNow = now()->format('d M Y');

        $data = [
            'irs' => $irs,
            'mahasiswa' => $mahasiswa,
            'itemIRS' => $itemIRS,
            'dateNow' => $dateNow
        ];

        $pdf = PDF::loadView('mahasiswa.irs_pdf', $data);
        return $pdf->download('IRS_' . $mahasiswa->nim . '.pdf');
    }

    // public function showRegistrasi()
    // {
    //     return view('mahasiswa.registrasi');
    // }


    // ketika submit otomatis mengupdate data semester. misal dr smstr 5 naik ke smstr 6
    // public function submitRegistrasi(Request $request)
    // {
    //     $validateData = $request->validate([
    //         'nama' => 'required',
    //         'nim' => 'required|string|max:20|exists:mahasiswa,nim',
    //         'semester' => 'required|integer',
    //     ]);

    //     // dd($validateData);

    //     $getLatestData = StatusAkademik::where('nim', $validateData['nim'])->first();
    //     $ipk = $getLatestData->ipk_komulatif ?? null;
    //     $batasSKS = $this->batasMaksimalSKS($validateData['nim'], $validateData['semester'], $ipk);

    //     $updated = StatusAkademik::where('nim', $validateData['nim'])
    //         ->update([
    //             'current_semester' => $validateData['semester'], // update current_semester
    //             'batas_sks' => $batasSKS,
    //         ]);

    //     if ($updated) {
    //         return redirect()->route('mahasiswa.dashboard')->with('success', 'Registrasi semester baru berhasil!');
    //     } else {
    //         return back()->with('error', 'Gagal memperbarui data status akademik.');
    //     }

    //     return redirect()->route('mahasiswa.dashboard')->with('successRegist', 'Registrasi semester baru berhasil!');
    // }
}