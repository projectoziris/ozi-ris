<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // ✅ Import betul
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['admin', 'staff', 'radiographer', 'doctor'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $users = [
            ['name' => 'Admin Sistem', 'email' => 'admin@example.com', 'role' => 'admin'],
            ['name' => 'Staff Klinik', 'email' => 'staff@example.com', 'role' => 'staff'],
            ['name' => 'Radiographer 1', 'email' => 'radiographer@example.com', 'role' => 'radiographer'],
            ['name' => 'Dr. Jane Doe', 'email' => 'doctor@example.com', 'role' => 'doctor'],
        ];

        foreach ($users as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password'),
                ]
            );

            $user->assignRole($data['role']);
        }
    }
}
