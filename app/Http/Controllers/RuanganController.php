<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Ruangan;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Menampilkan halaman manajemen ruangan.
     */
    public function showManajemenRuang()
    {
        $ruangan = Ruangan::all();
        $prodi = ProgramStudi::where('id_fakultas', 1)->get();  // Fetch program studi (prodi)
        return view('bagianAkademik.manajemen_ruang', compact('ruangan', 'prodi')); // Pass both variables to the view
    }


    public function getRuangByProdi(Request $request)
    {
        $prodi = $request->input('prodi');
        if (!$prodi) {
            return response()->json(['error' => 'Prodi tidak valid'], 400);
        }
        $ruangan = Ruangan::where('id_prodi', $prodi)->get();
        return response()->json($ruangan);
    }


    public function getRuanganByGedung(Request $request)
    {
        $gedung = $request->get('gedung');

        if (!$gedung) {
            return response()->json(['error' => 'Gedung tidak valid'], 400);
        }

        $ruangs = Ruangan::where('gedung', $gedung)->get(['nama_ruang', 'kapasitas_ruang']);
        return response()->json($ruangs);
    }

    /**
     * Menampilkan halaman ketersediaan ruang.
     */
    public function index()
    {
        $ruangs = Ruangan::join('program_studi', 'ruangan.id_prodi', '=', 'program_studi.id_prodi')
            ->orderByRaw("status = 'pending' DESC") // Mengurutkan berdasarkan status
            ->orderBy('program_studi.nama_prodi', 'ASC') // Mengurutkan berdasarkan nama_prodi
            ->get();
    
        $prodi = ProgramStudi::all(); // Mengambil data program studi
        return view('bagianAkademik.ketersediaan_ruang', compact('ruangs', 'prodi'));
    }
    
    /**
     * Mengatur kapasitas ruangan.
     */
    public function aturKapasitas(Request $request)
    {
        $validated = $request->validate([
            'id_prodi' => 'required|exists:program_studi,id_prodi',
            'gedung' => 'required|string',
            'nama_ruang' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($request) {
                    $gedung = $request->gedung;
                    $pattern = "/^{$gedung}[0-9]{3}$/";
                    if (!preg_match($pattern, $value)) {
                        $fail("Nama ruang harus dimulai dengan kode gedung \"$gedung\" diikuti 3 digit angka. Contoh: {$gedung}XXX.");
                    }
                }
            ],
            'kapasitas' => 'required|integer|min:1',
        ]);

        $prodi = ProgramStudi::find($validated['id_prodi']);
        $id_fakultas = $prodi->id_fakultas;
        // dd($id_fakultas);

        $existRuangan = Ruangan::where('gedung', $validated['gedung'])
            ->where('nama_ruang', $validated['nama_ruang'])
            ->where(function ($query) use ($validated, $id_fakultas) {
                $query->where('id_fakultas', $id_fakultas)  // fakultas sama
                    ->where('id_prodi', '!=', $validated['id_prodi'])  // beda prodi
                    ->orWhere(function ($query) use ($validated) {
                        // OR kondisi: (exact duplicate)
                        $query->where('id_prodi', $validated['id_prodi']);
                    });
            })
            ->first();

        if ($existRuangan) {
            return redirect()->back()->with('error', "Ruangan \"{$validated['nama_ruang']}\" sudah dibuat atau sudah terdaftar untuk prodi lain!");
        }

        Ruangan::create([
            'id_prodi' => $validated['id_prodi'],
            'id_fakultas' => $id_fakultas,
            'gedung' => $validated['gedung'],
            'nama_ruang' => $validated['nama_ruang'],
            'kapasitas' => $validated['kapasitas'],
        ]);

        return redirect()->route('bagianAkademik.ketersediaan_ruang')
            ->with('success', "Kapasitas ruangan \"{$validated['nama_ruang']}\" berhasil diperbarui!");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gedung' => 'required|string|max:255',
            'nama_ruang' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
        ]);

        $ruang = Ruangan::findOrFail($id);

        $ruang->gedung = $request->gedung;
        $ruang->nama_ruang = $request->nama_ruang;
        $ruang->kapasitas = $request->kapasitas;

        $ruang->save();

        Ruangan::where('id_ruang', $ruang->id_ruang)->update([
            'status' => 'pending',
        ]);


        return redirect()->route('bagianAkademik.ketersediaan_ruang')->with('success', 'Data ruang berhasil diperbarui!');
    }

    /**
     * Menghapus kapasitas ruangan.
     */
    public function hapus($id_ruang)
    {
        $ruangan = Ruangan::findOrFail($id_ruang);
        $jadwalCount = Jadwal::where('id_ruang', $id_ruang)->count();

        if ($jadwalCount > 0) {
            return response()->json([
                'status' => 'error',
                'message' => "Ruang {$ruangan->nama_ruang} tidak dapat dihapus karena sudah terpakai di jadwal!"
            ], 400);
        }

        $ruangan->delete();

        return redirect()->route('bagianAkademik.ketersediaan_ruang')->with('success', "Ruang {$ruangan->nama_ruang} berhasil dihapus!");
    }

    /**
     * Menampilkan halaman verifikasi ruangan.
     */
    public function showVerifikasi()
    {
        $ruanganPending = Ruangan::where('status', 'pending')->get(); // Data ruangan yang menunggu verifikasi
        $ruanganApproved = Ruangan::where('status', 'approved')->get(); // Data ruangan yang sudah disetujui
        return view('ruangan.verifikasi', compact('ruanganPending', 'ruanganApproved'));
    }

    /**
     * Proses verifikasi ruangan (Setujui atau Tolak).
     */
    public function verify(Request $request, $id)
    {
        $ruangan = Ruangan::findOrFail($id);

        if ($request->action === 'approve') {
            $ruangan->update(['status' => 'approved']);
            $message = "Ruangan {$ruangan->nama_ruang} berhasil disetujui.";
        } elseif ($request->action === 'reject') {
            $ruangan->update(['status' => 'rejected']);
            $message = "Ruangan {$ruangan->nama_ruang} berhasil ditolak.";
        } else {
            return redirect()->back()->with('error', 'Aksi tidak valid.');
        }

        return redirect()->route('ruangan.verifikasi')->with('success', $message);
    }
}