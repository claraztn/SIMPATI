<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';

    protected $primaryKey = 'kode_mk';
    public $incrementing = false;

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'semester',
        'sks',
        'sifat',
        'id_prodi',
    ];

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'id_prodi', 'id_prodi');
    }

    public function KHS()
    {
        return $this->hasMany(KHS::class, 'kode_mk', 'kode_mk');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'kode_mk', 'kode_mk');
    }

    public function dosenMataKuliah()
    {
        return $this->hasMany(DosenMataKuliah::class, 'kode_mk', 'kode_mk');
    }

    // public function jadwalKuliah()
    // {
    //     return $this->hasMany(Jadwal::class, 'kode_mk', 'kode_mk');
    // }
<<<<<<< HEAD
}
=======
}
>>>>>>> 7ade62540e5bd0d7bdc68d62f34c6e998a67af8a
