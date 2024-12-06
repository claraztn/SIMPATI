<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IRS extends Model
{
    use HasFactory;

    protected $table = 'IRS';

    protected $fillable = [
        'nim',
        'semester',
        'jmlsks',
        'scansks',
        'isverified',
        'kode_kelas',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode_kelas');
    }
<<<<<<< HEAD
=======

>>>>>>> 7ade62540e5bd0d7bdc68d62f34c6e998a67af8a
    public function itemIrsMahasiswa()
    {
        return $this->belongsTo(IrsItemMahasiswa::class, 'id_irs', 'id');
    }
}
