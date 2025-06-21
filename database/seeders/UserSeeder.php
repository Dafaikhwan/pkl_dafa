<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        DB::table('users')->delete();

        // Siswa
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin' => 1,
        ]);

         User::create([
            'name' => 'Member',
            'email' => 'member@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin' => 0,           
        ]);
    }
}
