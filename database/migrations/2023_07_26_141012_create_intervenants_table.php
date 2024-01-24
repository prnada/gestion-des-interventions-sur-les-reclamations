<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntervenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervenants', function (Blueprint $table) {
            $table->bigIncrements('id_intr');
            $table->unsignedBigInteger('id_met');
            $table->string('denomination', 100);
            $table->string('email_int', 70)->unique();
            $table->string('tel_int', 25)->nullable();
            $table->foreign('id_met')->references('MetId')->on('metiers');
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
        Schema::dropIfExists('intervenants');
    }
}