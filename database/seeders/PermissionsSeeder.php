<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Define permissions
        $permissions = [
            'view dashboard',
            'view search',

            'view user manage',
            'create user manage',


            'view role and permission',
            'create role and permission',


        ];

        // Create and store permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles and assign created permissions
        $rootAdminRole = Role::firstOrCreate(['name' => 'root admin', 'guard_name' => 'web']);
        $superAdminRole = Role::firstOrCreate(['name' => 'super admin', 'guard_name' => 'web']);
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
   
        // Create the Root admin
        $rootAdmin = User::firstOrCreate([
            'email' => 'root@admin.com',
        ], [
            'name' => 'Root admin',
            'designation' => 'admin',
            'password' => Hash::make('root@admin.com'),
            'status' => true,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $rootAdmin->assignRole($rootAdminRole);

        // Create the super admin user
        $superAdmin = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Super admin',
            'designation' => 'admin',
            'password' => Hash::make('admin@admin.com'),
            'status' => true,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $superAdmin->assignRole($superAdminRole);


        // Assign all permissions to super admin role
        $superAdminRole->syncPermissions(Permission::all());
        $adminRole->syncPermissions(Permission::all());
       
    }
}
