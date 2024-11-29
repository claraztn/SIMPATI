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
        'jam_mulai',
        'sks',
        'status',
    ];

    // Relasi ke Ruangan
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruang', 'id_ruang');
    }

    // Relasi ke Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode_kelas');
    }
}
