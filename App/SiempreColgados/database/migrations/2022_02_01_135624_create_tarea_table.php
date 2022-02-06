<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 40);
            $table->string('telefono', 15);
            $table->string('descripcion', 200);
            $table->string('correo', 60)->unique();
            $table->string('direccion', 40);
            $table->string('estado', 10);
            $table->date('fecha_crea');
            $table->date('fecha_rea');
            $table->string('anotacion_anterior', 200);
            $table->string('anotacion_posterior', 200);
            $table->string('fichero', 50);
            $table->unsignedInteger('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
}
