<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'name'=>'Husni Mubarok',
                'username'=>'hub',
                'email'=>'hub@gmail.com',
                'password'=>bcrypt('hub12345'),
                'role'=>'dosen',
            ],
            [
                'name'=>'Ahmad',
                'username'=>'ahmad',
                'email'=>'adhmad@gmail.com',
                'password'=>bcrypt('ahmad123'),
                'role'=>'mahasiswa',
            ],
            [
                'name'=>'Rifqi',
                'username'=>'rifqi',
                'email'=>'rifqi@gmail.com',
                'password'=>bcrypt('rifqi123'),
                'role'=>'mahasiswa',
            ],
            [
                'name'=>'Rifqi',
                'username'=>'rifqi',
                'email'=>'rifqi@gmail.com',
                'password'=>bcrypt('rifqi123'),
                'role'=>'mahasiswa',
            ],
            [
                'name'=>'aa',
                'username'=>'aa',
                'email'=>'rifqi@gmail.com',
                'password'=>bcrypt('rifqi123'),
                'role'=>'mahasiswa',
            ],
        ]);

    }
}
