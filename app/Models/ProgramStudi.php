<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika mengikuti konvensi Laravel)
    protected $table = 'program_studi';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'nama_prodi',
        'fakultas_id',
    ];

    // Relasi ke Fakultas (Many-to-One)
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id');
    }

    // Relasi ke Ruangan (One-to-Many, jika relevan)
    public function ruangan()
    {
        return $this->hasMany(Ruangan::class, 'id_prodi', 'id');
    }

    public function mataKuliah()
    {
        return $this->hasMany(MataKuliah::class, 'id_prodi', 'id');
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'prodi_id', 'id');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'prodi_id', 'id');
    }
}
