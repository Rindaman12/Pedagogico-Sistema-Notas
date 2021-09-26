<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InscripcionAlumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcion_alumno', function (Blueprint $table) {
            $table->id();
            $table->string('observaciones');
            $table->integer('id_seccion');
            $table->foreignId("id_alumno")->references("id")->on("alumnos")->constrained();
            $table->foreignId("id_lapso_academico")->references("id")->on("lapso_academico")->constrained();
            $table->foreignId("id_curso")->references("id")->on("cursos")->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripcion_alumno');
    }
}
