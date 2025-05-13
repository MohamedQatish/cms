<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'publish posts']);
        Permission::create(['name' => 'unpublish posts']);

        $role = Role::create(['name' => 'writer'])
            ->givePermissionTo(['create posts', 'edit posts']);

        $role = Role::create(['name' => 'editor'])
            ->givePermissionTo(['create posts', 'edit posts', 'publish posts', 'unpublish posts']);

        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());
    }
}
