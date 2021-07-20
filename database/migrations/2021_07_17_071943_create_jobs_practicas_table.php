<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsPracticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_practicas', function (Blueprint $table) {
            $table->id();
            $table->string('orden');
            $table->dateTime('datePosted');
            $table->string('title');
            $table->text('excerpt')->nullable();
            $table->string('vacantes')->nullable();
            $table->boolean('ett')->nullable()->default('0');
            $table->string('salario')->nullable();
            $table->string('contrato')->nullable();
            $table->string('jornada')->nullable();
            $table->string('experiencia')->nullable();
            $table->string('listaTipos')->nullable();
            $table->text('jobUrl');
            $table->string('jobFuente');
            $table->string('autonomia');
            $table->string('provincia');
            $table->string('localidad');
            $table->index('autonomia');
            $table->index('provincia');
            $table->index('localidad');
            $table->index('orden');

            $table->unsignedBigInteger('autonomiapractica_id');
            $table->foreign('autonomiapractica_id')->references('id')->on('autonomiapracticas');

            $table->unsignedBigInteger('provinciapractica_id');
            $table->foreign('provinciapractica_id')->references('id')->on('provinciapracticas');

            $table->unsignedBigInteger('localidadpractica_id');
            $table->foreign('localidadpractica_id')->references('id')->on('localidadpracticas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_practicas');
    }
}
