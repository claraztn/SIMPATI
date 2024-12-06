<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusAkademik extends Model
{
    protected $primaryKey = 'id';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'nim',
        'current_semester',
        'ipk_komulatif',
        'SKSk',
        'batas_sks',
        'status_kontrak_irs',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function dosen_wali()
    {
        return $this->belongsTo(Dosen::class, 'nip', 'nip');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 7ade62540e5bd0d7bdc68d62f34c6e998a67af8a
