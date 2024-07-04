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
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '+213659460948',
            'role_id' => 1,
            'img_path' => 'assets/images/user/',
            'img_name' => 'admin.png',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'active' => 1,
        ]);
    }
}
