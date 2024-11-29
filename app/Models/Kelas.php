<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'kode_kelas',
        'kode_mk',
        'tahun',
        'kuota',
    ];

    public function MataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }

    public function Jadwal()
    {
        return $this->hasOne(Jadwal::class, 'kode_kelas', 'kode_kelas');
    }
    public function irs()
    {
        return $this->hasMany(IRS::class, 'kode_kelas', 'kode_kelas');
    }
}

