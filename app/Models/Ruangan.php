<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ruangan extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai dengan konvensi plural dari Laravel (ruangans),
    // Anda dapat mendefinisikan nama tabel seperti ini
    protected $table = 'ruangan';

    // Jika nama primary key bukan 'id', tentukan secara eksplisit
    protected $primaryKey = 'id_ruang';

    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = ['nama_ruang', 'gedung', 'kapasitas'];
}
