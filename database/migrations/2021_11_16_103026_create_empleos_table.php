<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleos', function (Blueprint $table) {
            $table->id();
            $table->string('orden');
            $table->dateTime('datePosted');
            $table->string('title');
            $table->text('excerptCorto');
            $table->string('JobFuente');
            $table->text('JobUrl');
            $table->string('salario')->default("");
            $table->string('jornada')->default("");
            $table->string('contrato')->default("");
            $table->string('vacantes')->default("");


            $table->boolean('Texperiencia')->default(false);
            $table->boolean('Tett')->default(false);
            $table->boolean('Tdiscapacidad')->default(false);
            $table->boolean('Tteletrabajo')->default(false);
            $table->boolean('Tpracticas')->default(false);
            $table->boolean('T100teletrabajo')->default(false);
            $table->boolean('TsalarioConvenio')->default(false);
            $table->boolean('TsalarioHoras')->default(false);

            $table->string('autonomia');
            $table->unsignedBigInteger('autonomia_id');
            $table->foreign('autonomia_id')->references('id')->on('autonomias');

            $table->string('provincia');
            $table->unsignedBigInteger('provincia_id');
            $table->foreign('provincia_id')->references('id')->on('provincias');

            $table->string('localidad');
            $table->unsignedBigInteger('localidad_id');
            $table->foreign('localidad_id')->references('id')->on('localidads');

            $table->unsignedBigInteger('excerpt_id');
            $table->foreign('excerpt_id')->references('id')->on('excerpts');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleos');
    }
}
