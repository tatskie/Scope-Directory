<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number', 255)->unique();
            $table->boolean('is_expire')->default('0');
            $table->date('expire_at');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tif_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            
            $table->foreign('category_id')->references('id')->on('license_categories');
            $table->foreign('tif_id')->references('id')->on('t_i_f_s');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('receipts');
    }
}
