<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->unsignedBigInteger('id_recl');
            $table->unsignedBigInteger('id_intr');
            $table->unsignedBigInteger('id_fct');
            $table->date('dateINTR');
            $table->foreign('id_recl')->references('ReclId')->on('reclamations');
            $table->foreign('id_intr')->references('id_intr')->on('intervenants');
            $table->foreign('id_fct')->references('id')->on('frontusers');
            $table->primary(['id_recl', 'id_intr', 'id_fct']);
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
        Schema::dropIfExists('interventions');
    }
}