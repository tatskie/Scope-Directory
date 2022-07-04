<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoiceCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # id 1
	    DB::table('choice_codes')->insert([
            'type_of_choices' => 'True/False',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        # id 2
        DB::table('choice_codes')->insert([
            'type_of_choices' => 'Multiple Choice',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        # id 3
        DB::table('choice_codes')->insert([
            'type_of_choices' => 'Fill in the box',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        # id 4
        DB::table('choice_codes')->insert([
            'type_of_choices' => 'Select Option',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        # id 4
        DB::table('choice_codes')->insert([
            'type_of_choices' => 'Check Box',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
