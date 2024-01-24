<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamations', function (Blueprint $table) {
            $table->bigIncrements('ReclId');
            $table->string('Objet', 250)->nullable();
            $table->string('Description', 250);
            $table->date('dateR');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_loc');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_loc')->references('LocId')->on('locauxes');
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
        Schema::dropIfExists('reclamations');
    }
}