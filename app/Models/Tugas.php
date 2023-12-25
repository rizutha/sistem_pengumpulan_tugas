<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugass';
    protected $primaryKey ="id";
    protected $fillable = ['id','id_dosens','id_mahasiswas','matkul','semester','pertemuan','tgl_buat','tgl_dl','file_tugas'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosens');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswas');
    }
    public function pengumpulan()
    {
        return $this->hasMany(Pengumpulan::class, 'tugas_id');
    }
}
