<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// TESOL Language Specialist
        DB::table('plans')->insert([
            'name' => 'TESOL Language Specialist',
            'slug' => 'tesol-language-specialist',
            'stripe_plan' => 'plan_G7cQSFNb0LrENe',
            'cost' => '27.50',
            'cost_details' => 'one time free',
            'is_corporate' => '0',
            'details' => 'TESOL Language Specialist  Levels LS1-LS3',
            'description' => 'TESOL On-Line language Specialists OLS1-OLS2',
        ]);

        // TESOL ESP Specialist
        DB::table('plans')->insert([
            'name' => 'TESOL ESP Specialist',
            'slug' => 'tesol-esp-specialist',
            'stripe_plan' => 'plan_G7cSARsZvxFznE',
            'cost' => '39.50',
            'cost_details' => 'one time free',
            'is_corporate' => '0',
            'details' => 'TESOL ESP ( English for specific purposes) Specialist',
            'description' => 'ESPL1-ESPL2',
        ]);

        // Premier TESOL Language Specialist
        DB::table('plans')->insert([
            'name' => 'Premier TESOL Language Specialist',
            'slug' => 'premier-tesol-language-specialist',
            'stripe_plan' => 'plan_G7cWjaWpwyq2Hw',
            'cost' => '59.50',
            'cost_details' => 'one time free',
            'is_corporate' => '1',
            'details' => 'Premier TESOL Language Specialist',
            'description' => 'PTLS1-4',
        ]);

        // Academic Language Specialist
        DB::table('plans')->insert([
            'name' => 'Premier TESOL Language Specialist',
            'slug' => 'academic-language-specialist',
            'stripe_plan' => 'plan_G7cXxD35sAGjsP',
            'cost' => '75.97',
            'cost_details' => 'one time free',
            'is_corporate' => '0',
            'details' => 'Academic Language Specialist',
            'description' => 'AKLS1-2',
        ]);
    }
}
