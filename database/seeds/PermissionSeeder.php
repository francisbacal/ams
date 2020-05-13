<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'Create Item',
                'slug' => 'create-item',
            ],
            [
                'name' => 'Edit Item',
                'slug' => 'edit-item',
            ],
            [
                'name' => 'View Item',
                'slug' => 'view-item',
            ],
            [
                'name' => 'Destroy Item',
                'slug' => 'destroy-item',
            ],
            [
                'name' => 'Create Asset',
                'slug' => 'create-asset',
            ],
            [
                'name' => 'Edit Asset',
                'slug' => 'edit-asset',
            ],
            [
                'name' => 'View Asset',
                'slug' => 'view-asset',
            ],
            [
                'name' => 'Destroy Asset',
                'slug' => 'destroy-asset',
            ],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
