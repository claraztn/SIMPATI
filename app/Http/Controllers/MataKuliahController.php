<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    /**
     * Menampilkan daftar semua mata kuliah.
     */
    public function index()
    {
        $mataKuliah = MataKuliah::all();
        return view('admin.mata_kuliah.index', compact('mataKuliah'));
    }

    /**
     * Menampilkan form untuk menambahkan mata kuliah baru.
     */
    public function create()
    {
        return view('admin.mata_kuliah.create');
    }

    /**
     * Menyimpan mata kuliah baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mata_kuliah,kode_mk',
            'nama_mk' => 'required',
            'semester' => 'required|integer',
            'sks' => 'required|integer',
            'sifat' => 'required|in:Wajib,Pilihan',
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('mata_kuliah.index')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit mata kuliah.
     */
    public function edit($id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        return view('admin.mata_kuliah.edit', compact('mataKuliah'));
    }

    /**
     * Memperbarui mata kuliah yang dipilih.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mata_kuliah,kode_mk,' . $id,
            'nama_mk' => 'required',
            'semester' => 'required|integer',
            'sks' => 'required|integer',
            'sifat' => 'required|in:Wajib,Pilihan',
        ]);

        $mataKuliah = MataKuliah::findOrFail($id);
        $mataKuliah->update($request->all());

        return redirect()->route('mata_kuliah.index')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    /**
     * Menghapus mata kuliah yang dipilih.
     */
    public function destroy($id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        $mataKuliah->delete();

        return redirect()->route('mata_kuliah.index')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}