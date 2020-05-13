<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'name' => "Unassigned",
            ],
            [
                'name' => "Management",
            ],
            [
                'name' => "IT",
            ],
            [
                'name' => "Piping",
            ],
            [
                'name' => "Mechanical",
            ],
            [
                'name' => "Electrical",
            ],
            [
                'name' => "Civil",
            ],
        ];

        DB::table('sections')->insert($sections);
    }
}
