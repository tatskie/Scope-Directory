<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_choices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('points');
            $table->string('label', 255)->nullable();
            $table->unsignedBigInteger('question_id')->nullable();
            $table->unsignedBigInteger('followup_id')->nullable();
            
            $table->foreign('followup_id')->references('id')->on('followup_questions')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_choices');
    }
}
