<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    use HasFactory;
    protected $table = 'pengumpulans';
    protected $guarded =[''];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_tugass');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswas');
    }
    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'id_tugass');
    }
}
