<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocauxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locauxes', function (Blueprint $table) {
            $table->bigIncrements('LocId');
            $table->char('Local', 100);
            $table->string('NumLoc', 10);
            $table->string('Inventaire', 30);
            $table->unsignedBigInteger('id_etg');
            $table->foreign('id_etg')->references('EtgId')->on('etages');
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
        Schema::dropIfExists('locauxes');
    }
}