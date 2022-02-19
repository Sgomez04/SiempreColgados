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
            $table->string('telefono', 15)->nullable();
            $table->string('descripcion', 200)->nullable();
            $table->string('correo', 60)->unique()->nullable();
            $table->string('direccion', 40)->nullable();
            $table->string('poblacion', 40)->nullable();
            $table->string('cp', 5)->nullable();
            $table->string('estado', 10)->nullable();
            $table->date('fecha_crea')->nullable();
            $table->unsignedInteger('operario')->nullable();
            $table->foreign('operario')->references('id_empleado')->on('empleados');
            $table->date('fecha_rea')->nullable();
            $table->string('anotacion_anterior', 200)->nullable();
            $table->string('anotacion_posterior', 200)->nullable();
            $table->string('fichero', 50)->nullable()->nullable();
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
