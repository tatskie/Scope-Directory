<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LicenseCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // number 1
	    DB::table('license_categories')->insert([
	        'number' => '1',
	        'specialist_title' => 'TESOL Language Specialist',
	        'class' => '1',
	        'criteria_notes' => '',
	        'points_minimum' => '0',
	        'points_maximum' => '100',
	        'fee' => '39',
	        'shipping' => '',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

        // number 2
	    DB::table('license_categories')->insert([
	        'number' => '2',
	        'specialist_title' => 'TESOL Language Specialist',
	        'class' => '2',
	        'criteria_notes' => '',
	        'points_minimum' => '101',
	        'points_maximum' => '170',
	        'fee' => '57',
	        'shipping' => '',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 3
	    DB::table('license_categories')->insert([
	        'number' => '3',
	        'specialist_title' => 'Advanced TESOL Language Specialist',
	        'class' => '3',
	        'criteria_notes' => '',
	        'points_minimum' => '171',
	        'points_maximum' => '220',
	        'fee' => '68',
	        'shipping' => '',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);   

        // number 4
	    DB::table('license_categories')->insert([
	        'number' => '4',
	        'specialist_title' => 'TESOL ESP Specialist',
	        'class' => '4',
	        'criteria_notes' => '',
	        'points_minimum' => '221',
	        'points_maximum' => '269',
	        'fee' => '76',
	        'shipping' => '',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 5
	    DB::table('license_categories')->insert([
	        'number' => '5',
	        'specialist_title' => 'TESOL ESP Specialist',
	        'class' => '5',
	        'criteria_notes' => '',
	        'points_minimum' => '270',
	        'points_maximum' => '289',
	        'fee' => '89',
	        'shipping' => '',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 6
	    DB::table('license_categories')->insert([
	        'number' => '6',
	        'specialist_title' => 'TESOL Teacher Trainer',
	        'class' => '6',
	        'criteria_notes' => '',
	        'points_minimum' => '290',
	        'points_maximum' => '300',
	        'fee' => '98',
	        'shipping' => '',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 7
	    DB::table('license_categories')->insert([
	        'number' => '7',
	        'specialist_title' => 'Elite TESOL Teacher/Trainer',
	        'class' => '7',
	        'criteria_notes' => '',
	        'points_minimum' => '301',
	        'points_maximum' => '320',
	        'fee' => '115',
	        'shipping' => '',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 8
	    DB::table('license_categories')->insert([
	        'number' => '8',
	        'specialist_title' => 'Master TESOL Specialist',
	        'class' => '8',
	        'criteria_notes' => '',
	        'points_minimum' => '321',
	        'points_maximum' => '336',
	        'fee' => '135',
	        'shipping' => '',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 9
	    DB::table('license_categories')->insert([
	        'number' => '9',
	        'specialist_title' => 'Master TESOL Specialist',
	        'class' => '9',
	        'criteria_notes' => '',
	        'points_minimum' => '337',
	        'points_maximum' => '344',
	        'fee' => '150',
	        'shipping' => '',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 10
	    DB::table('license_categories')->insert([
	        'number' => '10',
	        'specialist_title' => 'TESOL Grand Master',
	        'class' => '10',
	        'criteria_notes' => 'By invitation',
	        'points_minimum' => '345',
	        'points_maximum' => '500',
	        'fee' => '150',
	        'shipping' => '',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
	}
}
