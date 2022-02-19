<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id_empleado');
            $table->string('name', 40);
            $table->string('password', 200)->nullable();
            $table->string('dni', 11)->nullable();
            $table->string('email', 60)->unique();
            $table->string('telefono', 11)->nullable();
            $table->string('direccion', 40)->nullable();
            $table->date('fecha_alta')->nullable();
            $table->string('tipo', 10)->nullable();
            $table->string('external_id', 11)->nullable();
            $table->string('external_auth', 11)->nullable();

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
        Schema::dropIfExists('empleados');
    }
}
