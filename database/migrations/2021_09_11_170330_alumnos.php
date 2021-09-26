<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alumnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nacionalidad');
            $table->string('cedula_alumno');
            $table->string('estatus');
            $table->date('fecha_inscripcion');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->string('primer_nombre');
            $table->string('segundo_nombre');
            $table->string('genero');
            $table->string('estado_civil');
            $table->date('fecha_nacimiento');
            $table->string('tlf_movil');
            $table->string('tlf_residencia')->nullable();
            $table->string('tlf_oficina')->nullable();
            $table->string('direccion_residencia');
            $table->string('direccion_oficina')->nullable();
            $table->string('email');
            $table->string('email2')->nullable();
            $table->foreignId("id_usuario")->references("id")->on("users")->constrained();
            $table->foreignId("id_instituto")->references("id")->on("institutos")->constrained();
            $table->foreignId("id_tipo_ingreso")->references("id")->on("tipo_ingreso")->constrained();
            $table->foreignId("id_nivel_postgrado")->references("id")->on("nivel_postgrado")->constrained();
            $table->foreignId("id_programa")->references("id")->on("programas")->constrained();
            $table->foreignId("id_lapso_academico")->references("id")->on("lapso_academico")->constrained();
            $table->foreignId("id_pais")->references("id")->on("pais")->constrained();
            $table->foreignId("id_estado")->references("id")->on("estados")->constrained();
            $table->foreignId("id_municipio")->references("id")->on("municipios")->constrained();
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
        Schema::dropIfExists('alumnos');
    }
}
