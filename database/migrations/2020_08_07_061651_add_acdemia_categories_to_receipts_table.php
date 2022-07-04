<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAcdemiaCategoriesToReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->unsignedBigInteger('aif_id')->nullable();
            $table->unsignedBigInteger('academia_id')->nullable();
            
            $table->foreign('academia_id')->references('id')->on('academia_categories')->onDelete('cascade');
            $table->foreign('aif_id')->references('id')->on('a_i_f_s')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->unsignedBigInteger('aif_id')->nullable();
            $table->unsignedBigInteger('academia_id')->nullable();
            
            $table->foreign('academia_id')->references('id')->on('academia_categories')->onDelete('cascade');
            $table->foreign('aif_id')->references('id')->on('a_i_f_s')->onDelete('cascade');
        });
    }
}
