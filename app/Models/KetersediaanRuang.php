<?php
    
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetersediaanRuang extends Model
{
    use HasFactory;
    
    protected $table = 'ketersediaan_ruangs'; // Nama tabel
    protected $fillable = ['gedung', 'nama_ruang', 'kapasitas_ruang']; // Kolom yang bisa diisi massal
}
