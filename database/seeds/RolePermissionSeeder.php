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
                "role_id" => 1,
                "permission_id" => 1,
            ],
            [
                "role_id" => 1,
                "permission_id" => 2,
            ],
            [
                "role_id" => 1,
                "permission_id" => 3,
            ],
            [
                "role_id" => 1,
                "permission_id" => 4,
            ],
            [
                "role_id" => 1,
                "permission_id" => 5,
            ],
            [
                "role_id" => 1,
                "permission_id" => 6,
            ],
            [
                "role_id" => 1,
                "permission_id" => 7,
            ],
            [
                "role_id" => 1,
                "permission_id" => 8,
            ],
            [
                "role_id" => 1,
                "permission_id" => 13,
            ],
            [
                "role_id" => 1,
                "permission_id" => 14,
            ],
            [
                "role_id" => 5,
                "permission_id" => 1,
            ],
            [
                "role_id" => 5,
                "permission_id" => 3,
            ],
            [
                "role_id" => 5,
                "permission_id" => 7,
            ],
            [
                "role_id" => 5,
                "permission_id" => 11,
            ],
            [
                "role_id" => 3,
                "permission_id" => 1,
            ],
            [
                "role_id" => 3,
                "permission_id" => 3,
            ],
            [
                "role_id" => 3,
                "permission_id" => 7,
            ],
            [
                "role_id" => 3,
                "permission_id" => 11,
            ],
        ];
        DB::table('roles_permissions')->insert($roles_permissions);
    }
}
