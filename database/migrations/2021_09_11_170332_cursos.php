<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_curso');
            $table->integer('unidad_credito');
            $table->integer('horas_semanales');
            $table->integer('horas_totales');
            $table->integer('minimo_alumnos');
            $table->integer('maximo_alumnos');
            $table->foreignId("id_plan_estudios")->references("id")->on("plan_estudios")->constrained();
            $table->foreignId("id_nivel_postgrado")->references("id")->on("nivel_postgrado")->constrained();
            $table->foreignId("id_programa")->references("id")->on("programas")->constrained();
            $table->foreignId("id_condicion")->references("id")->on("condicion_curso")->constrained();
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
        Schema::dropIfExists('cursos');
    }
}
