<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Programas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('titulo_otorgado');
            $table->integer('total_uc');
            $table->integer('tot_cre_obli');
            $table->integer('tot_cre_elec');
            $table->integer('tot_cre_tut');
            $table->string('descrip_nivel');
            $table->foreignId("id_plan_estudios")->references("id")->on("plan_estudios")->constrained();
            $table->foreignId("id_nivel_postgrado")->references("id")->on("nivel_postgrado")->constrained();
            $table->integer('id_cnu')->nullable();
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
        Schema::dropIfExists('programas');
    }
}
