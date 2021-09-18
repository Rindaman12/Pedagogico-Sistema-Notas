<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LapsoAcademico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapso_academico', function (Blueprint $table) {
            $table->id();
            $table->integer('ano');
            $table->string('nivel');
            $table->integer('tipo');
            $table->string('nombre');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
