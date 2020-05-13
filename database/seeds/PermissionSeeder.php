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
                'name' => 'Item Create',
                'slug' => 'item-create',
            ],
            [
                'name' => 'Item Edit',
                'slug' => 'item-edit',
            ],
            [
                'name' => 'Item View',
                'slug' => 'item-view',
            ],
            [
                'name' => 'Item Destroy',
                'slug' => 'item-destroy',
            ],
            [
                'name' => 'Asset Create',
                'slug' => 'asset-create',
            ],
            [
                'name' => 'Asset Edit',
                'slug' => 'asset-edit',
            ],
            [
                'name' => 'Asset View',
                'slug' => 'asset-view',
            ],
            [
                'name' => 'Asset Destroy',
                'slug' => 'asset-destroy',
            ],
            [
                'name' => 'Category Create',
                'slug' => 'category-create',
            ],
            [
                'name' => 'Category Edit',
                'slug' => 'category-edit',
            ],
            [
                'name' => 'Category View',
                'slug' => 'category-view',
            ],
            [
                'name' => 'Category Destroy',
                'slug' => 'category-destroy',
            ],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
