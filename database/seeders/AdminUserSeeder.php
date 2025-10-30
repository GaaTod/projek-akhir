<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // kondisi unik
            [
                'npm' => '22017',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );
        User::updateOrCreate(
            ['email' => 'agus@example.com'], // kondisi unik
            [
                'npm' => '22020',
                'email_verified_at' => now(),
                'password' => Hash::make('12345'),
                'role' => 'alumni',
            ]
        );
    }
}
