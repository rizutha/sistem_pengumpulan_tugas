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
            [
                'nip' => '24242424',
                'nama' => 'Husni Mubarok',
                'codename' => 'HUB',
                'tgl_lahir' => '1999-02-10',
                'alamat' => 'Pemalang',
                'kontak' => '087242424242',
                'email' => 'hub@gmail.com',
                'keilmuan' => 'Ekonomi & Keuangan',
                'foto' => 'images/husni2.png',
                'users_id' => '3',
            ],
        ]);
    }
}
