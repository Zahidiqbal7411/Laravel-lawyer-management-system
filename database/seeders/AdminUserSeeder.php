<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            [
                'email' => 'admin@gmail.com',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin1234'), // Change this password after first login
                'email_verified_at' => now(),
            ]
        );

        // Assign roles
        $user->syncRoles(['admin']);

        // ✅ Assign all permissions directly (optional but fills model_has_permissions)
        $allPermissions = Permission::pluck('name')->toArray();
        $user->syncPermissions($allPermissions); //
    }
}
