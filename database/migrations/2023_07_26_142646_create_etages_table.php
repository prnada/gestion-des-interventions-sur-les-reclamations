<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etages', function (Blueprint $table) {
            $table->bigIncrements('EtgId');
            $table->string('Etage', 20);
            $table->unsignedBigInteger('id_bat');
            $table->foreign('id_bat')->references('BatId')->on('batiments');
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
        Schema::dropIfExists('etages');
    }
}