<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin2025root'),
            'role' => 'admin'
        ]);
    }
}
