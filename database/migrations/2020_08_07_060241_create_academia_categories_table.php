<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiaCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->text('specialist_title');
            $table->string('class');
            $table->string('criteria_notes')->nullable();
            $table->integer('points_minimum');
            $table->integer('points_maximum');
            $table->integer('fee');
            $table->string('shipping')->nullable();
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
        Schema::dropIfExists('academia_categories');
    }
}
