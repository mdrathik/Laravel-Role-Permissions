<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'Create User']);
        Permission::create(['name' => 'Edit User']);
        Permission::create(['name' => 'Delete User']);
        Permission::create(['name' => 'Create Permission']);
        Permission::create(['name' => 'Edit Permission']);
        Permission::create(['name' => 'Delete Permission']);
        Permission::create(['name' => 'Create Role']);
        Permission::create(['name' => 'Edit Role']);
        Permission::create(['name' => 'Delete Role']);
        Permission::create(['name' => 'Create Post']);
        Permission::create(['name' => 'Edit Post']);
        Permission::create(['name' => 'Delete Post']);
        Permission::create(['name' => 'Show User']);
        Permission::create(['name' => 'Show Permission']);
        Permission::create(['name' => 'Show Role']);
        Permission::create(['name' => 'Show Post']);
    }
}
