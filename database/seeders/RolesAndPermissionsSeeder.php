<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'delete all chirps']);

        // Create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        
        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('delete all chirps');
    }
}
