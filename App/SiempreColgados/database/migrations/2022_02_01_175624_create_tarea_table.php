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
            $table->increments('id_tarea');
            $table->unsignedInteger('id_cliente');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->string('telefono', 15);
            $table->string('descripcion', 200);
            $table->string('correo', 60)->unique();
            $table->string('direccion', 40);
            $table->string('poblacion', 40);
            $table->string('cp', 5);
            $table->string('estado', 10);
            $table->date('fecha_crea');
            $table->unsignedInteger('operario');
            $table->foreign('operario')->references('id_empleado')->on('empleados');
            $table->date('fecha_rea');
            $table->string('anotacion_anterior', 200);
            $table->string('anotacion_posterior', 200);
            $table->string('fichero', 50);
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
        Schema::dropIfExists('tareas');
    }
}
