<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agencija_za_nekretnines', function (Blueprint $table) {
            $table->renameColumn('kartica', 'brojRacuna');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agencija_za_nekretnines', function (Blueprint $table) {
            $table->renameColumn('brojRacuna', 'kartica');
        });
    }
};
