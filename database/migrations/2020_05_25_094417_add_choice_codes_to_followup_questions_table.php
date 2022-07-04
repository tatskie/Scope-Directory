<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChoiceCodesToFollowupQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('followup_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('code_id')->nullable();
            $table->foreign('code_id')->references('id')->on('choice_codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('followup_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('code_id')->nullable();
            $table->foreign('code_id')->references('id')->on('choice_codes');
        });
    }
}
