<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TIFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // number 1
	    DB::table('t_i_f_s')->insert([
            'number' => '1',
	        'title' => 'TIF Silver',
	        'points_minimum' => '1',
	        'points_maximum' => '30',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 2
	    DB::table('t_i_f_s')->insert([
            'number' => '2',
	        'title' => 'TIF Gold',
	        'points_minimum' => '31',
	        'points_maximum' => '70',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 3
	    DB::table('t_i_f_s')->insert([
            'number' => '3',
	        'title' => 'TIF Platinum',
	        'points_minimum' => '71',
	        'points_maximum' => '90',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 1
	    DB::table('t_i_f_s')->insert([
            'number' => '4',
	        'title' => 'TIF Platinum Elite',
	        'points_minimum' => '90',
	        'points_maximum' => '200',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
