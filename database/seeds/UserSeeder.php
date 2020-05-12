<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'firstname' => "Admin",
                'lastname' => "Francis",
                'email' => "admin@admin.com",
                'role_id' => 1,
                'section_id' => 1,
                'password' => Hash::make('password123')
            ],
            [
                'firstname' => "Coco",
                'lastname' => "Martin",
                'email' => "user@email.com",
                'role_id' => 5,
                'section_id' => 3,
                'password' => Hash::make('password')
            ],
        ]);
    }
}
