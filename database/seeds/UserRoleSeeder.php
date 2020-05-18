<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_roles = [
            [
                "user_id" => 1,
                "role_id" => 1,
            ],
            [
                "user_id" => 2,
                "role_id" => 3,
            ],
            [
                "user_id" => 3,
                "role_id" => 5,
            ],
        ];
        DB::table('users_roles')->insert($users_roles);
    }
}
