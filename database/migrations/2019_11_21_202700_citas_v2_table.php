<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Citasv2Table extends Migration
{

    public function up()
    {
        Schema::dropIfExists('citas');

        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_hora_inicial');
            $table->dateTime('fecha_hora_final');
            $table->string('localizacion');
            $table->unsignedInteger('medico_id');
            $table->unsignedInteger('paciente_id');
            $table->timestamps();

            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');

        });
    }
    
    public function down()
    {
        Schema::drop('citas');

        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_hora');
            $table->unsignedInteger('medico_id');
            $table->unsignedInteger('paciente_id');
            $table->timestamps();

            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
        });
    }
}