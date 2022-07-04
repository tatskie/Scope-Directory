7<?php

use App\Question;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// number 1
	    DB::table('questions')->insert([
            'question' => 'Do you have a Bachelors degree?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '1',
            'label' => 'Yes',
	        'points' => '15',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '1',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '1',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // number 2
        DB::table('questions')->insert([
            'question' => 'Do you have a University TESOL Masters degree?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '2',
            'label' => 'Yes',
	        'points' => '25',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '2',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'University full name?',
            'url' => uniqid(),
            'question_id' => '2',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '1',
            'label' => '',
	        'points' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '2',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // number 3
        DB::table('questions')->insert([
            'question' => 'Do you have a University Masters degree in another field of study?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '3',
            'label' => 'Yes',
	        'points' => '20',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '3',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '3',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 4
        DB::table('questions')->insert([
            'question' => 'Do you have a University PhD?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '4',
            'label' => 'Yes',
	        'points' => '35',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '4',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'University full name?',
            'url' => uniqid(),
            'question_id' => '4',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '2',
            'label' => '',
	        'points' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '4',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // number 5
        DB::table('questions')->insert([
            'question' => 'Are you Board of Education licensed? (a Government licensed Teacher)',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '5',
            'label' => 'Yes',
	        'points' => '18',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '5',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Who is the Issuing authority?',
            'url' => uniqid(),
            'question_id' => '5',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '3',
            'label' => '',
	        'points' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '5',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // number 6
        DB::table('questions')->insert([
            'question' => 'Do you work in a public or private university in teaching a capacity?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '6',
            'label' => 'Yes',
	        'points' => '16',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '6',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '6',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 7
        DB::table('questions')->insert([
            'question' => 'Do you work in a Public school in a teaching capacity? (any subject)',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '7',
            'label' => 'Yes',
	        'points' => '13',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '7',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '7',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 8
        DB::table('questions')->insert([
            'question' => 'Do you work for a private ESL/EFL school as a teacher?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '8',
            'label' => 'Yes',
	        'points' => '10',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '8',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '8',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 9
        DB::table('questions')->insert([
            'question' => 'Do you work in ESL EFL TESOL materials development?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);////

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '9',
            'label' => 'Yes',
	        'points' => '8',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '9',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '9',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 10
	    DB::table('questions')->insert([
            'question' => 'Are you TESOL certified?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '10',
            'label' => 'Yes',
	        'points' => '10',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '10',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '10',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // number 11
        DB::table('questions')->insert([
            'question' => 'Are you TESOL certified with a CELTA, Bridge TESL, TESOL Asia, ITTT or TESOL Academy certificate?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '11',
            'label' => 'Yes',
	        'points' => '25',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '11',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of Certificate Issuing Authority?',
            'url' => uniqid(),
            'question_id' => '11',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '4',
            'label' => '',
	        'points' => '15',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '11',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // number 12
        DB::table('questions')->insert([
            'question' => 'Have you taught English in an ESL/EFL country?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '12',
            'label' => 'Yes',
	        'points' => '10',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '12',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'How many years have you worked in ESL/EFL country?',
            'url' => uniqid(),
            'question_id' => '12',
            'code_id' => '4',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '5',
            'label' => '1',
	        'points' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '5',
            'label' => '2',
	        'points' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '5',
            'label' => '3',
	        'points' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '5',
            'label' => '4',
	        'points' => '4',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '5',
            'label' => '5',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '5',
            'label' => '6',
	        'points' => '6',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '5',
            'label' => '7',
	        'points' => '7',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '5',
            'label' => '8',
	        'points' => '8',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '5',
            'label' => '9',
	        'points' => '9',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '5',
            'label' => '10+',
	        'points' => '10',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '12',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // number 13
	    DB::table('questions')->insert([
            'question' => 'Have you worked for EPIK, JET, NET, Auxiliares de Conversación, Teaching Assistant Program, NET Hong Kong, or other Government Sponsored ELT program?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '13',
            'label' => 'Yes',
	        'points' => '17',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '13',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '13',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // number 14
        DB::table('questions')->insert([
            'question' => 'Have you taught ESP (English for Specific Purposes)?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '14',
            'label' => 'Yes',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '14',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'In which Area? Business, Medical, Engineering, Legal, other...',
            'url' => uniqid(),
            'question_id' => '14',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '6',
            'label' => '',
	        'points' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '14',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // number 15
        DB::table('questions')->insert([
            'question' => 'Are you a current member of a TESOL organization or other English teaching/linguistics entity? e.g. KOTESOL, JALT , TESOL International Association, IATEFL, CATESOL, Africa TESOL.',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '15',
            'label' => 'Yes',
	        'points' => '15',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '15',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of organization?',
            'url' => uniqid(),
            'question_id' => '15',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '7',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '15',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // number 16
        DB::table('questions')->insert([
            'question' => 'Have you ever delivered a speech at a local TESOL conference?',
	       	'url' => uniqid(),
	       	'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '16',
            'label' => 'Yes',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '16',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name and year of event?',
            'url' => uniqid(),
            'question_id' => '16',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '8',
            'label' => '',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '16',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // number 17
        DB::table('questions')->insert([
            'question' => 'Are you or have you been a Committee Member of a TESOL or TESOL related organization?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '17',
            'label' => 'Yes',
	        'points' => '6',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '17',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of organization?',
            'url' => uniqid(),
            'question_id' => '17',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '9',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '17',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // number 18
        DB::table('questions')->insert([
            'question' => 'Have you been/are a President/Vice President or on an executive committee of a TESOL membership  or TESOL membership related organization?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '18',
            'label' => 'Yes',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '18',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of organization?',
            'url' => uniqid(),
            'question_id' => '18',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '10',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '18',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // number 19
        DB::table('questions')->insert([
            'question' => 'Are you or have you been a TESOL Teacher Trainer?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '19',
            'label' => 'Yes',
	        'points' => '6',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '19',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '19',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 20
        DB::table('questions')->insert([
            'question' => 'Are you an ADOS / DOS / or have had other ESL/EFL supervisory position?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '20',
            'label' => 'Yes',
	        'points' => '10',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '20',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '20',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 21
        DB::table('questions')->insert([
            'question' => 'Have you taught English to Young learners whose mother tongue is other than English?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '21',
            'label' => 'Yes',
	        'points' => '4',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '21',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'How many years?',
            'url' => uniqid(),
            'question_id' => '21',
            'code_id' => '4',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '11',
            'label' => '1',
	        'points' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '11',
            'label' => '2',
	        'points' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '11',
            'label' => '3',
	        'points' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '11',
            'label' => '4',
	        'points' => '4',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '11',
            'label' => '5',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '11',
            'label' => '6',
	        'points' => '6',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '11',
            'label' => '7',
	        'points' => '7',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '11',
            'label' => '8',
	        'points' => '8',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '11',
            'label' => '9',
	        'points' => '9',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '11',
            'label' => '10+',
	        'points' => '10',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '21',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 22
        DB::table('questions')->insert([
            'question' => 'Have you taught ESL, EFL, EAP, ESP to adults whose mother tongue is not English?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '22',
            'label' => 'Yes',
	        'points' => '4',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '22',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'How many years?',
            'url' => uniqid(),
            'question_id' => '22',
            'code_id' => '4',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '12',
            'label' => '1',
	        'points' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '12',
            'label' => '2',
	        'points' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '12',
            'label' => '3',
	        'points' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '12',
            'label' => '4',
	        'points' => '4',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '12',
            'label' => '5',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '12',
            'label' => '6',
	        'points' => '6',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '12',
            'label' => '7',
	        'points' => '7',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '12',
            'label' => '8',
	        'points' => '8',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '12',
            'label' => '9',
	        'points' => '9',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '12',
            'label' => '10+',
	        'points' => '10',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '22',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // tif 1 with id 23
        DB::table('questions')->insert([
            'question' => 'Have you taught ESL EFL through an NGO project in a developing country?',
	        'url' => uniqid(),
	        'impact_factor' => true,
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '23',
            'label' => 'Yes',
	        'points' => '20',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '23',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '23',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 23 with id 24
        DB::table('questions')->insert([
            'question' => 'Have you taught Live On-Line English?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '24',
            'label' => 'Yes',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '24',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of Company.',
            'url' => uniqid(),
            'question_id' => '24',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '13',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '24',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 24 with id 25
        DB::table('questions')->insert([
            'question' => 'Have you taught Live Phone English?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '25',
            'label' => 'Yes',
	        'points' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '25',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of Company.',
            'url' => uniqid(),
            'question_id' => '25',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '14',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '25',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // tif 2 with id 26
        DB::table('questions')->insert([
            'question' => 'Have you ever volunteered for an English Language Teaching project?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'impact_factor' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);     

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '26',
            'label' => 'Yes',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '26',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'In which country was the project?',
            'url' => uniqid(),
            'code_id' => '3',
            'question_id' => '26',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '15',
            'label' => 'Yes',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '26',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 25 with id 27
        DB::table('questions')->insert([
            'question' => 'Have you published an article in an academic Scopus / ISI indexed Journal?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '27',
            'label' => 'Yes',
	        'points' => '15',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '27',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of journal and volume?',
            'url' => uniqid(),
            'code_id' => '3',
            'question_id' => '27',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '16',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '27',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 26 with id 28
        DB::table('questions')->insert([
            'question' => 'Have you ever published in a SLA non-indexed journal or hard cover ESL EFL text book?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '28',
            'label' => 'Yes',
	        'points' => '12',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '28',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of journal or book title? Please include ISBN.',
            'url' => uniqid(),
            'code_id' => '3',
            'question_id' => '28',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '17',
            'label' => '',
	        'points' => '10',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '28',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // number 27 with id 29
        DB::table('questions')->insert([
            'question' => 'Is this ESL/EFL TESOL profession your long term career?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '29',
            'label' => 'Yes',
	        'points' => '14',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '29',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '29',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 28 with id 30
        DB::table('questions')->insert([
            'question' => 'Are you involved in producing Artificial Intelligence teaching programs?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '30',
            'label' => 'Yes',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '30',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '30',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 29 with id 31
        DB::table('questions')->insert([
            'question' => 'Have you authored / co authored a book or instructional materials that have been incorporated into the school curriculum?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '31',
            'label' => 'Yes',
	        'points' => '10',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '31',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Please provide data.',
            'url' => uniqid(),
            'code_id' => '3',
            'question_id' => '31',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '18',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '31',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 30 with id 32
        DB::table('questions')->insert([
            'question' => 'Have you undertaken a Professional Development course in the last two years?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '32',
            'label' => 'Yes',
	        'points' => '4',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '32',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Provide brief details.',
            'url' => uniqid(),
            'code_id' => '3',
            'question_id' => '32',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '19',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '32',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // tif 3 with id 33
        DB::table('questions')->insert([
            'question' => 'Have you worked on/in/ volunteered  /with any NGO community project, either in your home country or foreign country?',
	       	'url' => uniqid(),
	       	'code_id' => '1',
	        'impact_factor' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '33',
            'label' => 'Yes',
	        'points' => '16',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '33',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Describe in 50 words that project.',
           	'url' => uniqid(),
           	'code_id' => '3',
            'question_id' => '33',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '20',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '33',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // tif 4 with id 34
        DB::table('questions')->insert([
            'question' => 'Are you a member (of) or helped any club? ( example, dog  club, Friends of the earth, Greenpeace, school - church - religious club/ group/ sports club) etc, online help/ volunteer group?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'impact_factor' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '34',
            'label' => 'Yes',
	        'points' => '4',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '34',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of club, society, group?',
            'url' => uniqid(),
            'question_id' => '34',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '21',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '34',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // tif 5 with id 35
        DB::table('questions')->insert([
            'question' => 'Have you volunteered for any school/education project?',
	       	'url' => uniqid(),
	        'impact_factor' => true,
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '35',
            'label' => 'Yes',
	        'points' => '8',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '35',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Describe that project in 20 words or less.',
            'url' => uniqid(),
            'question_id' => '35',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '22',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '35',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // tif 6 with id 36
        DB::table('questions')->insert([
            'question' => 'Are you a member or helped in any way with such groups or programs as (for  example)  Meals on Wheels, Greenpeace, Save the earth projects, helping senior citizens, helping under privileged groups, St John Ambulance first aider, etc?',
	        'url' => uniqid(),
	        'impact_factor' => true,
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '36',
            'label' => 'Yes',
	        'points' => '25',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '36',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Describe that project in 20 words or less.',
            'url' => uniqid(),
            'code_id' => '3',
            'question_id' => '36',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '23',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '14',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '36',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // tif 7 with id 37
        DB::table('questions')->insert([
            'question' => 'Have you built or been part of a team building a web site that provides non commercial help to any section of society?',
	        'url' => uniqid(),
	        'impact_factor' => true,
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '37',
            'label' => 'Yes',
	        'points' => '17',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '37',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Describe that project or www site.',
            'url' => uniqid(),
            'question_id' => '37',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '24',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '37',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // tif 8 with id 38
        DB::table('questions')->insert([
            'question' => 'Are you a member of any other volunteer community not covered by the above questions?',
	        'url' => uniqid(),
	        'impact_factor' => true,
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '38',
            'label' => 'Yes',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '38',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Describe that project in 20 words or less.',
            'url' => uniqid(),
            'question_id' => '38',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '25',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '38',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
