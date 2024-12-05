<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenMataKuliah extends Model
{
    use HasFactory;

    protected $table = 'dosen_mata_kuliah';

    protected $fillable = [
        'nip',
        'kode_mk',
        'tahun',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nip', 'nip');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'kode_mk', 'kode_mk');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }
}
