<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangan';
    protected $primaryKey = 'id_ruang';
    protected $fillable = ['nama_ruang', 'gedung', 'kapasitas'];
    public $timestamps = false;
}

