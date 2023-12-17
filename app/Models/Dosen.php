<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosens';
    protected $fillable = [
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
}
