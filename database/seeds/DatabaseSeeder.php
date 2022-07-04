<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(LicenseCategoryTableSeeder::class);
        $this->call(ChoiceCodeTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(PlansTableSeeder::class);
        $this->call(TIFSeeder::class);
        $this->call(AcademiaQuestionTableSeeder::class);
        $this->call(UndergradQuestionTableSeeder::class);
    }
}
