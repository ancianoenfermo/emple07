<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTeletrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_teletrabajos', function (Blueprint $table) {
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

            $table->unsignedBigInteger('tipoteletrabajo_id');
            $table->foreign('tipoteletrabajo_id')->references('id')->on('tipoteletrabajos');

            $table->unsignedBigInteger('autonomiateletrabajo_id');
            $table->foreign('autonomiateletrabajo_id')->references('id')->on('autonomiateletrabajos');

            $table->unsignedBigInteger('provinciateletrabajo_id');
            $table->foreign('provinciateletrabajo_id')->references('id')->on('provinciateletrabajos');

            $table->unsignedBigInteger('localidadteletrabajo_id');
            $table->foreign('localidadteletrabajo_id')->references('id')->on('localidadteletrabajos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_teletrabajos');
    }
}
