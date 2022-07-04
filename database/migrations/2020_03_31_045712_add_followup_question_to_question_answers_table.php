<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFollowupQuestionToQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('followup_id')->nullable();
            $table->foreign('followup_id')->references('id')->on('followup_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('followup_id')->nullable();
            $table->foreign('followup_id')->references('id')->on('followup_questions');
        });
    }
}
