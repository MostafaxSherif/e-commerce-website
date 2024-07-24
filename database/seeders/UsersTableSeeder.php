<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeder for regular user
        User::create([
            'name' => 'User',
            'user_type' => 'user',
            'phone_num' => '1234567890',
            'email' => 'user@example.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);

        // Seeder for admin user
        User::create([
            'name' => 'Admin',
            'user_type' => 'admin',
            'phone_num' => '0987654321',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);
    }
}
