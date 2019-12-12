<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CitasV2Table extends Migration
{

    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->integer('duracion');
            $table->dateTime('hora_final');
            $table->unsignedInteger('localizacion_id');

            $table->foreign('localizacion_id')->references('id')->on('localizacions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->dropColumn(['duracion','hora_final', 'localizacion_id']);
        });
    }
}