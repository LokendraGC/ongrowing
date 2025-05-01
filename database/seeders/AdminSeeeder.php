<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or get the admin role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Create or get the admin user two array because first is to find the user after that it will insert
        // name and password
        $user = User::firstOrCreate(
            ['email' => 'gclokendra10@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'),
            ]
        );

        // Assign role if not already assigned
        if (!$user->hasRole($adminRole)) {
            $user->assignRole($adminRole);
        }

        // Give all permissions to the role (avoids duplicate permissions)
        $permissions = Permission::all();
        $adminRole->syncPermissions($permissions);
    }
}
