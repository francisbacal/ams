<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'General Manager',
                'slug' => 'general-manager',
            ],
            [
                'name' => 'Section Manager',
                'slug' => 'section-manager',
            ],
            [
                'name' => 'Group Manager',
                'slug' => 'group-manager',
            ],
            [
                'name' => 'Regular Employee',
                'slug' => 'employee',
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
