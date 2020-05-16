<?php

use Illuminate\Database\Seeder;

class RequisitionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requisition_statuses')->insert([
            [
                'name' => 'Pending',
            ],
            [
                'name' => 'Checked',
            ],
            [
                'name' => 'Approved',
            ],
            [
                'name' => 'Rejected',
            ],
        ]);
    }
}
