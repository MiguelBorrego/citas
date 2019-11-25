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
            $table->string('localizacion');
        });
    }

    public function down()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->dropColumn(['duracion', 'localizacion']);
        });
    }
}