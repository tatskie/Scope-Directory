<?php

use App\Question;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademiaQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // academia 1 with id 39
        DB::table('questions')->insert([
            'question' => 'What is your highest academic qualification?',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '39',
            'label' => 'Masters',
	        'points' => '20',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '39',
            'label' => 'Doctorate',
	        'points' => '50',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '39',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia 2 with id 40
        DB::table('questions')->insert([
            'question' => 'How many years have you worked in academia?',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '40',
            'label' => '1-10',
	        'points' => '10',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '40',
            'label' => '11-20',
	        'points' => '20',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '40',
            'label' => '21-30',
	        'points' => '30',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '40',
            'label' => '31+',
	        'points' => '50',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '40',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia 3 with id 41
        DB::table('questions')->insert([
            'question' => 'How many SCOPUS indexed articles have your published?',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '41',
            'label' => '1-10',
	        'points' => '20',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '41',
            'label' => '11-20',
	        'points' => '30',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '41',
            'label' => '21-30',
	        'points' => '40',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '41',
            'label' => '31+',
	        'points' => '50',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '41',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia 4 with id 42
        DB::table('questions')->insert([
            'question' => 'How many ISI indexed articles have your published?',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '42',
            'label' => '1-10',
	        'points' => '20',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '42',
            'label' => '11-20',
	        'points' => '30',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '42',
            'label' => '21-30',
	        'points' => '40',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '42',
            'label' => '31+',
	        'points' => '50',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '42',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // academia 5 with id 43
        DB::table('questions')->insert([
            'question' => 'How many International conferences have you been invited to be as Key Note Speaker at?',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '43',
            'label' => '1-5',
	        'points' => '20',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '43',
            'label' => '6-20',
	        'points' => '30',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '43',
            'label' => '21-30',
	        'points' => '50',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '43',
            'label' => '30+50',
	        'points' => '80',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '43',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // academia 6 with id 44
        DB::table('questions')->insert([
            'question' => 'How many International conferences have you been a Research Presenter?',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '44',
            'label' => '1-10',
	        'points' => '15',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '44',
            'label' => '11-20',
	        'points' => '25',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '44',
            'label' => '21-30',
	        'points' => '35',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '44',
            'label' => '30+',
	        'points' => '60',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '44',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // academia 7 with id 45
        DB::table('questions')->insert([
            'question' => 'How many hard cover publications have been published with you as author/co-author?',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '45',
            'label' => '1-10',
	        'points' => '20',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '45',
            'label' => '11-20',
	        'points' => '35',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '45',
            'label' => '21-30',
	        'points' => '60',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '45',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // academia 8 with id 46
        DB::table('questions')->insert([
            'question' => 'What is your ORCID #? ( ORCID is an individual researcher identifier)',
	        'url' => uniqid(),
	        'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '46',
            'label' => '',
	        'points' => '10',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '46',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // academia 9 with id 47
        DB::table('questions')->insert([
            'question' => 'What is your H Index? NB. For the H index, for those who published in Scopus you can check your H index in Scopus and those who published in ISI can check theirs using Publons',
	        'url' => uniqid(),
	        'code_id' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '47',
            'label' => 'H3',
	        'points' => '15',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '47',
            'label' => 'H9',
	        'points' => '18',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '47',
            'label' => 'H12',
	        'points' => '36',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '47',
            'label' => 'H16',
	        'points' => '64',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '47',
            'label' => 'H25',
	        'points' => '125',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '47',
            'label' => 'H40',
	        'points' => '240',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '47',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // academia 10 with id 48
        DB::table('questions')->insert([
            'question' => 'Are you or have you been the Chief Editor of any academic journal?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '48',
            'label' => 'Yes',
	        'points' => '60',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '48',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Please provide name of journal and ISSN.',
            'url' => uniqid(),
            'question_id' => '48',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '26',
            'label' => '',
	        'points' => '60',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '48',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // academia 11 with id 49
        DB::table('questions')->insert([
            'question' => 'Are you or have you been the Chief Editor of any academic journal?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '49',
            'label' => 'Yes',
	        'points' => '40',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '49',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Please provide name of journal and ISSN.',
            'url' => uniqid(),
            'question_id' => '49',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '27',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '49',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // academia 12 with id 50
        DB::table('questions')->insert([
            'question' => 'Have you been published in any of the following journals?',
	        'url' => uniqid(),
	        'code_id' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '50',
            'label' => 'Asian EFL Journal',
	        'points' => '100',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '50',
            'label' => 'TESOL International Journal',
	        'points' => '150',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '50',
            'label' => 'English as an International language Journal',
	        'points' => '100',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '50',
            'label' => 'Asian ESP Journal',
	        'points' => '150',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '50',
            'label' => 'MJSELT',
	        'points' => '100',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '50',
            'label' => 'Language Teaching',
	        'points' => '25',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '50',
            'label' => 'TESOL Quarterly',
	        'points' => '15',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '50',
            'label' => 'Asia TEFL Journal',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '50',
            'label' => 'Modern Language Journal',
	        'points' => '10',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '50',
            'label' => 'Other',
	        'points' => '15',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '50',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // aif 1 with id 51
        DB::table('questions')->insert([
            'question' => 'Have you volunteered to lead / assist/ undertake in any educational project in your university?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'impact_factor' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '51',
            'label' => 'Yes',
	        'points' => '40',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '51',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '51',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // aif 2 with id 52
        DB::table('questions')->insert([
            'question' => 'Are you a member of an Applied Linguistics/ Linguistics/TESOL/Language Teacher Association?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'impact_factor' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '52',
            'label' => 'Yes',
	        'points' => '50',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '52',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of the organization.',
            'url' => uniqid(),
            'question_id' => '52',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '28',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '52',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // aif 3 with id 53
        DB::table('questions')->insert([
            'question' => 'Are you a member of any community club?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'impact_factor' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '53',
            'label' => 'Yes',
	        'points' => '50',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '53',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '53',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // aif 4 with id 54
        DB::table('questions')->insert([
            'question' => 'Have you built or been part of a team building a web site that provides non-commercial help to any section of society?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'impact_factor' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '54',
            'label' => 'Yes',
	        'points' => '50',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '54',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '54',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // aif 5 with id 55
        DB::table('questions')->insert([
            'question' => 'Are you a member of any other volunteer community not covered by the above questions?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'impact_factor' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '55',
            'label' => 'Yes',
	        'points' => '50',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '55',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '55',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // aif 6 with id 56
        DB::table('questions')->insert([
            'question' => 'Will you become a member of the World TESOL Organization? (www.world-tesol-organization.com)',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'impact_factor' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '56',
            'label' => 'Yes',
	        'points' => '50',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '56',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // academia
	    DB::table('filter_questions')->insert([
            'question_id' => '56',
	        'roles' => 'academia',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
