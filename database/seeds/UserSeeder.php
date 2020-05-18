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
                'image' => 'dist/img/avatar04.png',
                'password' => Hash::make('password123'),
            ],
            [
                'firstname' => "Dear",
                'lastname' => "Charo",
                'email' => "dearcharo@ams-m.com",
                'section_id' => 2,
                'image' => 'dist/img/avatar2.png',
                'password' => Hash::make('password'),
            ],
            [
                'firstname' => "Coco",
                'lastname' => "Martin",
                'email' => "user@email.com",
                'section_id' => 2,
                'image' => 'dist/img/cocoprofile.png',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
