<?php

use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles_permissions = [
            [
                "role_id" => 5,
                "permission_id" => 11,
            ],
        ];
        DB::table('roles_permissions')->insert($roles_permissions);
    }
}
