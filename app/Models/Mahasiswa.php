<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'tgl_lahir',
        'kontak',
        'email',
        'prodi',
        'semester',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
