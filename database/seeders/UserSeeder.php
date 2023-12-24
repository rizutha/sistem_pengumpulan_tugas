<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name'=>'Admin',
                'username'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('admin123'),
                'role'=>'admin',
            ],
            [
                'name'=>'Husni Faqih',
                'username'=>'hnf',
                'email'=>'hnf@gmail.com',
                'password'=>bcrypt('hnf12345'),
                'role'=>'dosen',
            ],
            [
                'name'=>'Rifqi',
                'username'=>'rifqi',
                'email'=>'rifqi@gmail.com',
                'password'=>bcrypt('rifqi123'),
                'role'=>'mahasiswa',
            ],
        ]);

    }
}
