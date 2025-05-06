<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@ebook.com',
            'password' => Hash::make('admin123'),
            'role' =>'admin'
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@ebook.com',
            'password' => Hash::make('user123'),
            'role' =>'user'
        ]);
    }
}
 