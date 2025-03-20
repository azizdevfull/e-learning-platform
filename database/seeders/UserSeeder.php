<?php

namespace Database\Seeders;

use App\Models\Role;
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
        // O'qituvchi
        User::create([
            'name' => 'Azamjon Kamolov',
            'email' => 'teacher1@example.com',
            'password' => Hash::make('password'),
            'role_id' => Role::where('name', 'teacher')->first()->id,
        ]);

        // Talabalar
        User::create([
            'name' => 'Shoxista Raximova',
            'email' => 'student1@example.com',
            'password' => Hash::make('password'),
            'role_id' => Role::where('name', 'student')->first()->id,
        ]);

        User::create([
            'name' => 'Kamola Azizova',
            'email' => 'student2@example.com',
            'password' => Hash::make('password'),
            'role_id' => Role::where('name', 'student')->first()->id,
        ]);
    }
}
