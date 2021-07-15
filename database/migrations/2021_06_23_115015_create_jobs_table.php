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

            $table->unsignedBigInteger('tipotodos_id');
            $table->unsignedBigInteger('tipodiscapacidad_id')->nullable();
            $table->unsignedBigInteger('tipoteletrabajo_id')->nullable();
            $table->unsignedBigInteger('tipopractica_id')->nullable();

            $table->foreign('tipotodos_id')->references('id')->on('tipotodos');
            $table->foreign('tipodiscapacidad_id')->references('id')->on('tipodiscapacidads');
            $table->foreign('tipoteletrabajo_id')->references('id')->on('tipoteletrabajos');
            $table->foreign('tipopractica_id')->references('id')->on('tipopracticas');




            $table->unsignedBigInteger('autonomia_id');
            $table->unsignedBigInteger('provincia_id');
            $table->unsignedBigInteger('localidad_id');

            $table->foreign('autonomia_id')->references('id')->on('autonomias');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('localidad_id')->references('id')->on('localidades');



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
