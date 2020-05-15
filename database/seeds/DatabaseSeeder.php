<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            SectionSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
            CategorySeeder::class,
            UserRoleSeeder::class,
            UserPermissionSeeder::class,
            RolePermissionSeeder::class,
            AssetStatusSeeder::class,
            AssetSeeder::class,
            CategoryStockSeeder::class,

        ]);
    }
}
