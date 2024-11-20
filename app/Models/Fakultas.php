<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;
    protected $table = 'fakultas';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama_fakultas',
        'no_telepon_fakultas',
        'email_fakultas',
    ];

    public function programStudi()
    {
        return $this->hasMany(ProgramStudi::class, 'fakultas_id', 'id');
    }
    public function Ruangan()
    {
        return $this->hasMany(Ruangan::class, 'fakultas_id', 'id');
    }
    
}

