<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAIFSToLicenseCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('license_cards', function (Blueprint $table) {
            $table->unsignedBigInteger('aif_id')->nullable();
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
        Schema::table('license_cards', function (Blueprint $table) {
            $table->unsignedBigInteger('aif_id')->nullable();
            $table->foreign('aif_id')->references('id')->on('a_i_f_s')->onDelete('cascade');
        });
    }
}
