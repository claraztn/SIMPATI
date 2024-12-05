<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    // Menentukan primary key untuk tabel 'mahasiswa'
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string'; // Tipe primary key adalah string

    /**
     * Relasi ke model User (One to One).
     * Mahasiswa memiliki satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function statusAkademik()
    {
        return $this->belongsTo(StatusAkademik::class, 'nim', 'nim');
    }

    /**
     * Relasi ke model Dosen (One to One).
     * Mahasiswa memiliki satu Dosen Wali.
     */
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_wali', 'nip');
    }

    /**
     * Relasi ke model ProgramStudi (One to One).
     * Mahasiswa terdaftar di satu program studi.
     */
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'id_prodi', 'id_prodi');
    }

    /**
     * Relasi ke IRS (One to Many).
     * Mahasiswa memiliki banyak IRS.
     */
    public function IRS()
    {
        return $this->hasMany(IRS::class, 'nim', 'nim');
    }

    public function IRSItem()
    {
        return $this->hasMany(IrsItemMahasiswa::class, 'nim', 'nim');
    }

    // Karena irs nya akan banyak arsipnya, maka di pembimbing akademik ambil yang terbaruu
    // public function latestIRS()
    // {
    //     return $this->hasOne(IRS::class, 'nim', 'nim')->latest('created_at');
    // }


    /**
     * Relasi ke KHS (One to Many).
     * Mahasiswa memiliki banyak KHS.
     */
    public function KHS()
    {
        return $this->hasMany(KHS::class, 'nim', 'nim');
    }

    // Jika ada kolom-kolom lain yang harus diisi seperti 'status', 'alamat', dll.
    // Anda bisa menambahkan properti untuk mengatur mass assignment.
    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'email',
        'alamat_mahasiswa',
        'no_telepon_mahasiswa',
        'tanggal_lahir',
        'jenis_kelamin',
        'status',
        'angkatan',
        'dosen_wali',
        'id_user',
        'id_prodi'
    ];

    // Jika ada kolom yang tidak perlu di-serialize, Anda dapat menambahkannya
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}