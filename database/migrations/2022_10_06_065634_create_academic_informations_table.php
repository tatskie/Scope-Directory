<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_informations', function (Blueprint $table) {
            $table->id();
            $table->string('employer');
            $table->tinyInteger('is_present')->default(0);
            $table->integer('index');
            $table->date('from');
            $table->date('to')->nullable();
            $table->text('bio');
            $table->text('additional_information')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_informations');
    }
}
