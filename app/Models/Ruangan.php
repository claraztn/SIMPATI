<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika nama tabel mengikuti konvensi plural Laravel)
    protected $table = 'ruangan';

    // Primary key (opsional jika menggunakan kolom selain 'id' sebagai primary key)
    protected $primaryKey = 'id_ruang';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'gedung',
        'nama_ruang',
        'kapasitas',
        'status',
        'fakultas_id',
        'id_prodi',
    ];

    // Relasi ke Fakultas (Many-to-One)
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id');
    }

    // Relasi ke Program Studi (Many-to-One)
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'id_prodi', 'id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_ruang', 'id_ruang');
    }


}
