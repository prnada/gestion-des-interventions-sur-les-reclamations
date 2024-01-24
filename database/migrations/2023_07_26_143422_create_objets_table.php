<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objets', function (Blueprint $table) {
            $table->unsignedBigInteger('id_mat');
            $table->unsignedBigInteger('id_recl');
            $table->string('Reference', 20);
            $table->foreign('id_mat')->references('MatId')->on('materiels');
            $table->foreign('id_recl')->references('ReclId')->on('reclamations');
            $table->primary(['id_recl', 'id_mat']);
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
        Schema::dropIfExists('objets');
    }
}