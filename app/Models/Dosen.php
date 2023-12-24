<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosens';
    protected $fillable = [
        'users_id',
        'nip',
        'nama',
        'codename',
        'tgl_lahir',
        'alamat',
        'kontak',
        'email',
        'keilmuan',
        'foto',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }
    public function pengumpulan()
{
    return $this->hasManyThrough(Pengumpulan::class, Tugas::class, 'id_dosens', 'id_tugas');
}

}
