<?php

// database/seeders/RoleSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Gunakan firstOrCreate untuk menghindari duplikasi
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'dosen']);
        Role::firstOrCreate(['name' => 'mahasiswa']);
    }
}
