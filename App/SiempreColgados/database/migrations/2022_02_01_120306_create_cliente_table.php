<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id_cliente');
            $table->string('cif', 40);
            $table->string('nombre', 40);
            $table->string('telefono', 11);
            $table->string('correo', 60)->unique();
            $table->string('cuenta_corriente', 40);
            $table->unsignedInteger('id_pais');
            $table->foreign('id_pais')->references('id')->on('paises');
            $table->string('moneda',3);
            $table->string('cuota_mensual', 40);
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
        Schema::dropIfExists('clientes');
    }
}
