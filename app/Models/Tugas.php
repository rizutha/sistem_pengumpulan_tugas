<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugass';
    protected $fillable = [
        'matkul',
        'semester',
        'pertemuan',
        'link_tugas',
        'nilai',
        'tgl_buat',
        'tgl_deadline',
        'tgl_pengumpulan',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosens');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswas');
    }
}
