<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KHS extends Model
{
    use HasFactory;

    protected $table = 'khs';

    protected $fillable = [
        'nim',
        'semester',
        'kode_mk',
        'tahun',
        'skssemester',
        'skskumulatif',
        'ipsemester',
        'ipkumulatif',
        'scankhs',
        'isverified',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }
}
