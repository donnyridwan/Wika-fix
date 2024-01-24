<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin_password'),
            'role' => 'admin',
            'perusahaan' => 'Admin Company',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create a regular user
        DB::table('users')->insert([
            'nama' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('user_password'),
            'role' => 'user',
            'perusahaan' => 'User Company',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
