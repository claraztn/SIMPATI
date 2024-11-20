<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    // Field yang dapat diisi (mass assignable)
    protected $fillable = [
        'nip', 
        'nama_dosen',
        'alamat_dosen',
        'no_telepon_dosen',
        'email_dosen',
        'role',
        'user_id',
        'prodi_id',
    ];

    /**
     * Relasi ke model User (One to One).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Relasi ke model ProgramStudi (Many to One).
     */
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id', 'id');
    }

    /**
     * Relasi ke model Mahasiswa (One to Many).
     */
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'dosen_wali', 'nip');
    }

    /**
     * Relasi ke model DosenMataKuliah (One to Many).
     */
    public function dosenMataKuliah()
    {
        return $this->hasMany(DosenMataKuliah::class, 'nip', 'nip');
    }
}
