<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuotas', function (Blueprint $table) {
            $table->increments('id_cuota');
            $table->string('concepto', 40)->nullable();
            $table->date('fecha_emision')->nullable();
            $table->double('importe')->nullable();
            $table->string('pagada', 1)->nullable();
            $table->date('fecha_pago')->nullable();
            $table->string('notas', 255)->nullable();
            $table->string('tipo', 200)->nullable();
            $table->unsignedInteger('id_cliente')->nullable();
            $table->double('importe_moneda_cliente')->nullable();
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');

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
        Schema::dropIfExists('cuotas');
    }
}
