<?php

use App\Question;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UndergradQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // undergrad 1 with id 57
        DB::table('questions')->insert([
            'question' => 'What is your highest academic qualification?',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '57',
            'label' => 'High School',
	        'points' => '20',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '57',
            'label' => 'Bachelor',
	        'points' => '40',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '57',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // undergrad 2 with id 58
        DB::table('questions')->insert([
            'question' => 'How many years have you been an undergraduate?',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '58',
            'label' => '1',
	        'points' => '10',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '58',
            'label' => '2',
	        'points' => '20',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '58',
            'label' => '3',
	        'points' => '30',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '58',
            'label' => '4',
	        'points' => '40',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '58',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad 3 with id 59
        DB::table('questions')->insert([
            'question' => 'How many Local / National conferences have you attended?',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '59',
            'label' => '0',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '59',
            'label' => '1-3',
	        'points' => '10',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '59',
            'label' => '4-7',
	        'points' => '20',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '59',
            'label' => '>8',
	        'points' => '40',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name, location and date of conferences.',
            'url' => uniqid(),
            'question_id' => '59',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '29',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '59',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // undergrad 4 with id 60
        DB::table('questions')->insert([
            'question' => 'How many National conferences have you presented a paper at?',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '60',
            'label' => '0',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '60',
            'label' => '1-3',
	        'points' => '20',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '60',
            'label' => '4-7',
	        'points' => '40',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '60',
            'label' => '>8',
	        'points' => '50',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of conference, date and country.',
            'url' => uniqid(),
            'question_id' => '60',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '30',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '60',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // undergrad 5 with id 61
        DB::table('questions')->insert([
            'question' => 'How many International conferences have you attended?',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '61',
            'label' => '1-3',
	        'points' => '30',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '61',
            'label' => '>3',
	        'points' => '60',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of conference, date and country.',
            'url' => uniqid(),
            'question_id' => '61',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '31',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '61',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad 6 with id 62
        DB::table('questions')->insert([
            'question' => 'How many hard cover publications have been published with you as author/co-author?',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '62',
            'label' => '0',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '62',
            'label' => '1-4',
	        'points' => '20',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '62',
            'label' => '>5',
	        'points' => '35',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of Publication, ISBN and article title.',
            'url' => uniqid(),
            'question_id' => '62',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '32',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '62',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad 7 with id 63
        DB::table('questions')->insert([
            'question' => 'How many hard cover publications have you published a chapter in?',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '63',
            'label' => '0',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '63',
            'label' => '1-4',
	        'points' => '50',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '63',
            'label' => '>5',
	        'points' => '85',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of Publication, ISBN and article title.',
            'url' => uniqid(),
            'question_id' => '63',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '33',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '63',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // undergrad 8 with id 64
        DB::table('questions')->insert([
            'question' => 'Are you a member of an Applied Linguistics/ Linguistics/TESOL/Language Teacher Association?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '64',
            'label' => 'Yes',
	        'points' => '50',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '64',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of the organization.',
            'url' => uniqid(),
            'question_id' => '64',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '34',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '64',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad 9 with id 65
        DB::table('questions')->insert([
            'question' => 'Have you presented an Unpublished thesis to your department supervisor?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '65',
            'label' => 'Yes',
	        'points' => '50',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '65',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Thesis title, Supervisor name and University.',
            'url' => uniqid(),
            'question_id' => '65',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '35',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '65',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // undergrad 10 with id 66
        DB::table('questions')->insert([
            'question' => 'Have you as author or co-author had a paper published in any journal/publication?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '66',
            'label' => 'Yes',
	        'points' => '40',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '66',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Please provide full details.',
            'url' => uniqid(),
            'question_id' => '66',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '36',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '66',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // undergrad 11 with id 67
        DB::table('questions')->insert([
            'question' => 'Have you published an article(s) in any of your countries Locally accredited journals?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '67',
            'label' => 'Yes',
	        'points' => '25',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '67',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of Journal, ISSN, title of paper.',
            'url' => uniqid(),
            'question_id' => '67',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '37',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '67',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // undergrad 12 with id 68
        DB::table('questions')->insert([
            'question' => 'Have you undertaken a Supervised Teaching practice?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '68',
            'label' => 'Yes',
	        'points' => '35',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '68',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name of your Teaching practice supervisor and university.',
            'url' => uniqid(),
            'question_id' => '68',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '38',
            'label' => '',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '68',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // undergrad 13 with id 69
        DB::table('questions')->insert([
            'question' => 'Have you undertaken a TESOL certificate certification?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '69',
            'label' => 'Yes',
	        'points' => '100',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '69',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Please provide Name of TESOL provider.',
            'url' => uniqid(),
            'question_id' => '69',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '39',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '69',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // SIF 1 with id 70
        DB::table('questions')->insert([
            'question' => 'Have you volunteered for an NGO project?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'impact_factor' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '70',
            'label' => 'Yes',
	        'points' => '30',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '70',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Please provide brief information.',
            'url' => uniqid(),
            'question_id' => '70',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '40',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '70',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // SIF 2 with id 71
        DB::table('questions')->insert([
            'question' => 'Have you undertaken any Social Work as an Undergraduate?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'impact_factor' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '71',
            'label' => 'Yes',
	        'points' => '30',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '71',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Provide details of the Social Work.',
            'url' => uniqid(),
            'question_id' => '71',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '41',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '71',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // SIF 3 with id 72
        DB::table('questions')->insert([
            'question' => 'Have you volunteered for a University help project?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'impact_factor' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '72',
            'label' => 'Yes',
	        'points' => '45',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '72',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Please provide brief information.',
            'url' => uniqid(),
            'question_id' => '72',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '42',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '72',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // SIF 3 with id 73
        DB::table('questions')->insert([
            'question' => 'Are you a member of any volunteer club/group?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'impact_factor' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '73',
            'label' => 'Yes',
	        'points' => '35',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '73',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Please provide brief information.',
            'url' => uniqid(),
            'question_id' => '73',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '43',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         // undergrad
	    DB::table('filter_questions')->insert([
            'question_id' => '73',
	        'roles' => 'undergrad',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // TEACHERS QUESTIONS ADDITIONAL

        // number 31 with id 74
        DB::table('questions')->insert([
            'question' => 'Have you taught any or all of the following - IELTS, TOEIC, TOEFL, Pearson Test of English?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '74',
            'label' => 'Yes',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '74',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name the course you taught.',
            'url' => uniqid(),
            'code_id' => '3',
            'question_id' => '74',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '44',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '74',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 32 with id 74
        DB::table('questions')->insert([
            'question' => 'Have you worked previously or currently work as a TESOL Consultant?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '75',
            'label' => 'Yes',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '75',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '75',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 33 with id 76
        DB::table('questions')->insert([
            'question' => 'Have you written a research paper that has been presented in a national/ international research conference?',
	        'url' => uniqid(),
	        'code_id' => '1',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '76',
            'label' => 'Yes',
	        'points' => '7',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '76',
            'label' => 'No',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions
	    DB::table('followup_questions')->insert([
            'question' => 'Name and year of Conference.',
            'url' => uniqid(),
            'code_id' => '3',
            'question_id' => '76',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	    // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '45',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '76',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // number 34 with id 77
        DB::table('questions')->insert([
            'question' => 'Thank you for answering the questions. The algorithm has assessed your score and appointed a Professional TESOL Designation Level which you will see following this. You may then proceed to answer the TIF – Teacher Impact Questions which relate to any volunteer or community work you have done.',
	        'url' => uniqid(),
	        'code_id' => '2',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'question_id' => '77',
            'label' => 'Proceed',
	        'points' => '5',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

	     // teacher
	    DB::table('filter_questions')->insert([
            'question_id' => '77',
	        'roles' => 'teacher',
	        'is_yes' => true,
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Followup Questions number 13
	    DB::table('followup_questions')->insert([
            'question' => 'Please name which program you worked for & country.',
            'url' => uniqid(),
            'question_id' => '13',
            'code_id' => '3',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Choices
	    DB::table('question_choices')->insert([
	    	'followup_id' => '46',
            'label' => '',
	        'points' => '0',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
