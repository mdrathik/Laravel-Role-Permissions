<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PostSeeder::class);
         $this->call(PermissionSeeder::class);
         $this->call(RoleSeeder::class);
         $this->call(UserSeeder::class);
    }
}
