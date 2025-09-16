<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Super Admin
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@dpmptspme.go.id'],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        if (! $superAdmin->hasRole('super_admin')) {
            $superAdmin->assignRole('super_admin');
        }

        // Pengguna
        $pengguna = User::firstOrCreate(
            ['email' => 'user@dpmptspme.go.id'],
            [
                'name' => 'Pengguna',
                'password' => Hash::make('password'), // ubah di production
                'email_verified_at' => now(),
            ]
        );
        if (! $pengguna->hasRole('pengguna')) {
            $pengguna->assignRole('pengguna');
        }
    }
}
