<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function pengumpulan()
    {
        return $this->hasMany(Pengumpulan::class);
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

}
