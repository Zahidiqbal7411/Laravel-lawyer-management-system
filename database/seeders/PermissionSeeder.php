<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view user dashboard',
            'view admin dashboard',
            'manage services',
            'manage service features',
            'manage roles',
            'manage permissions',
            'assign permissions',
            'assign roles',
            'manage menus',
            'manage technologies',
            'manage reasons',
            'manage profile',
            'manage projects',
            'manage assets',
            'manage documents',
            'manage blogs',
            'manage chat',
            'manage career',
            'manage contact',
            'manage admin panel',
            'manage analytics',
            'manage seo',
            'manage backup',
            'manage logs',
            // Developer permissions
            'view developer dashboard',
            'access works folder',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}
