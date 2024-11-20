<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    /**
     * Relasi ke model User (One to One).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Relasi ke model Dosen (One to One).
     */
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_wali', 'nip');
    }

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id', 'id');
    }

    public function IRS()
    {
        return $this->hasMany(IRS::class, 'nim', 'nim');
    }

    public function KHS()
    {
        return $this->hasMany(KHS::class, 'nim', 'nim');
    }
}
