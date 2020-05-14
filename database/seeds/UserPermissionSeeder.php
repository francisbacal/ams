<?php

use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_permissions = [
            [
                "user_id" => 1,
                "permission_id" => 9,
            ],
            [
                "user_id" => 1,
                "permission_id" => 10,
            ],
            [
                "user_id" => 1,
                "permission_id" => 11,
            ],
            [
                "user_id" => 1,
                "permission_id" => 12,
            ],
        ];
        DB::table('users_permissions')->insert($users_permissions);
    }
}
