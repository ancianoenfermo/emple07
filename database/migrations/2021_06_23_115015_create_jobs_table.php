<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('orden');
            $table->dateTime('datePosted');
            $table->string('title');
            $table->text('excerpt')->nullable();
            $table->string('vacantes')->nullable();
            $table->boolean('ett')->nullable()->default('0');
            $table->string('salario')->nullable();
            $table->unsignedBigInteger('localidade_id');
            $table->unsignedBigInteger('contrato_id')->nullable();
            $table->unsignedBigInteger('fuente_id')->nullable();
            $table->unsignedBigInteger('jornada_id')->nullable();
            $table->unsignedBigInteger('experiencia_id')->nullable();


            $table->foreign('localidade_id')->references('id')->on('localidades');
            $table->foreign('contrato_id')->references('id')->on('contratos');
            $table->foreign('fuente_id')->references('id')->on('fuentes');
            $table->foreign('jornada_id')->references('id')->on('jornadas');
            $table->foreign('experiencia_id')->references('id')->on('experiencias');

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
        Schema::dropIfExists('jobs');
    }
}
