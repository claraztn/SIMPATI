<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IrsItemMahasiswa extends Model
{
    protected $primaryKey = 'id';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'id_irs',
        'nim',
        'kode_mk',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruang',
    ];

    public function irs()
    {
        return $this->belongsTo(IRS::class, 'id_irs', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(IrsItemMahasiswa::class, 'nim', 'nim');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }
}