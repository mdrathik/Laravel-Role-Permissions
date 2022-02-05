<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'SuperAdmin']);
        $role->givePermissionTo(['Create User','Edit User','Delete User','Create Permission','Edit Permission','Delete Permission','Create Role','Edit Role','Delete Role','Create Post','Edit Post','Delete Post','Show User','Show Permission','Show Role','Show Post']);
    }
}
