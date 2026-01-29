<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
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
        // Cari role admin
        $adminRole = Role::where('name', 'admin')->first();

        // Buat user admin
        User::create([
            'name'     => 'Administrator',
            'email'    => 'admin@kasir.test',
            'password' => Hash::make('admin123'),
            'role_id'  => $adminRole->id,
        ]);

        // Cari role kasir
        $kasirRole = Role::where('name', 'kasir')->first();

        // Buat user kasir
        User::create([
            'name'     => 'Kasir User',
            'email'    => 'kasir@kasir.test',
            'password' => Hash::make('kasir123'),
            'role_id'  => $kasirRole->id,
        ]);
    }
}
