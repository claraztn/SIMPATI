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
<<<<<<< HEAD
        // 'kode_mk',
=======
>>>>>>> 7ade62540e5bd0d7bdc68d62f34c6e998a67af8a
        'tahun',
        'kuota',
    ];

<<<<<<< HEAD
    // public function MataKuliah()
    // {
    //     return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    // }

=======
>>>>>>> 7ade62540e5bd0d7bdc68d62f34c6e998a67af8a
    public function Jadwal()
    {
        return $this->hasOne(Jadwal::class, 'kode_kelas', 'kode_kelas');
    }

    public function irs()
    {
        return $this->hasMany(IRS::class, 'kode_kelas', 'kode_kelas');
    }

    public function dosenMataKuliah()
    {
        return $this->hasOne(DosenMataKuliah::class, 'kode_mk', 'kode_mk');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 7ade62540e5bd0d7bdc68d62f34c6e998a67af8a
