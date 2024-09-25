<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Menggunakan bcrypt untuk mengenkripsi password
            'nidn' => 'NIDN123',
        ]);

        // Assign role 'admin' ke user ini
        $user->assignRole('admin');
    }
}
