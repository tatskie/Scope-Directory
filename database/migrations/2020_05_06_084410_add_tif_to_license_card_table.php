<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTifToLicenseCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('license_cards', function (Blueprint $table) {
            $table->unsignedBigInteger('tif_id')->nullable();
            $table->foreign('tif_id')->references('id')->on('t_i_f_s');
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
            $table->unsignedBigInteger('tif_id')->nullable();
            $table->foreign('tif_id')->references('id')->on('t_i_f_s');
        });
    }
}
