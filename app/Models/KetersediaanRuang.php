<?php
    
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetersediaanRuang extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'ketersediaan_ruangs'; 

    // Kolom yang bisa diisi massal
    protected $fillable = ['gedung', 'nama_ruang', 'kapasitas_ruang']; 
}
