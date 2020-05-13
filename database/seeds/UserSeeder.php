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
                'section_id' => 2,
                'password' => Hash::make('password123'),
            ],
            [
                'firstname' => "Coco",
                'lastname' => "Martin",
                'email' => "user@email.com",
                'section_id' => 4,
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
