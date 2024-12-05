<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';

    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = true;

    protected $fillable = [
        'hari',
        'id_ruang',
        'kode_kelas',
        'kode_mk',
        'jam_mulai',
        'jam_selesai',
        // 'sks',
        'status',
    ];

    // Relasi ke Ruangan
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruang', 'id_ruang');
    }

    // Relasi ke MK
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }

    // Relasi ke Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode_kelas');
    }

    // Relasi ke DOSEN
    public function dosenMataKuliah()
    {
        return $this->hasMany(DosenMataKuliah::class, 'kode_mk', 'kode_mk');
    }

    public function dosens()
    {
        return $this->hasManyThrough(Dosen::class, DosenMataKuliah::class, 'kode_mk', 'nip', 'kode_mk', 'nip');
    }
}