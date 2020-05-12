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
                'name' => 'Admin'
            ],
            [
                'name' => 'General Manager'
            ],
            [
                'name' => 'Section Manager'
            ],
            [
                'name' => 'Group Manager'
            ],
            [
                'name' => 'Regular Employee'
            ],
        ];


        DB::table('roles')->insert($roles);
    }
}
