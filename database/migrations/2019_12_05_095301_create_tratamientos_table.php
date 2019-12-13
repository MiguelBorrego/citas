<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_inicial');
            $table->date('fecha_final');
            $table->string('descripcion');
            $table->unsignedInteger('cita_id');
            $table->timestamps();

            $table->foreign('cita_id')->references('id')->on('citas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamientos');

    }
}

