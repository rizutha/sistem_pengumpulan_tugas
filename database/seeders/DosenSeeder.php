<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dosen::insert([
            [
                'nip' => '23232323',
                'nama' => 'Husni Faqih',
                'codename' => 'HNF',
                'tgl_lahir' => '1999-01-10',
                'alamat' => 'Pangkah',
                'kontak' => '087232323232',
                'email' => 'hnf@gmail.com',
                'keilmuan' => 'Sistem Informasi',
                'foto' => 'images/husni1.png',
                'users_id' => '2',
            ],
        ]);
    }
}
