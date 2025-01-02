<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view students',
            'create students',
            'edit students',
            'delete students',
            'view classes',
            'create classes',
            'edit classes',
            'delete classes',
            'view sections',
            'create sections',
            'edit sections',
            'delete sections',
            'manage users',
            'manage roles',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo([
            'view students',
            'create students',
            'edit students',
            'delete students',
            'view classes',
            'create classes',
            'edit classes',
            'delete classes',
            'view sections',
            'create sections',
            'edit sections',
            'delete sections',
        ]);

        $role = Role::create(['name' => 'teacher']);
        $role->givePermissionTo([
            'view students',
            'view classes',
            'view sections',
        ]);
    }
}
