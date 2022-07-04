<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAcademiaCategoriesToLicenseCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('license_cards', function (Blueprint $table) {
            $table->unsignedBigInteger('academia_id')->nullable();
            $table->foreign('academia_id')->references('id')->on('academia_categories')->onDelete('cascade');
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
            $table->unsignedBigInteger('academia_id')->nullable();
            $table->foreign('academia_id')->references('id')->on('academia_categories')->onDelete('cascade');
        });
    }
}
