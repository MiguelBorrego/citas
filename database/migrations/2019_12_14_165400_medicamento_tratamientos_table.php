<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MedicamentoTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento_tratamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->float('unidades');
            $table->string('frecuencia');
            $table->string('instrucciones');
            $table->unsignedInteger('medicamento_id');
            $table->unsignedInteger('tratamiento_id');

            $table->timestamps();

            $table->foreign('medicamento_id')->references('id')->on('medicamentos')->onDelete('cascade');
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicamento_tratamientos');

    }
}

