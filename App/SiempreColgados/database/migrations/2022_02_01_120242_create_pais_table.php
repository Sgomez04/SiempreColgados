<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paises', function (Blueprint $table) {
            $table->increments('id');
            $table->char('iso2', 2);
            $table->char('iso3', 3);
            $table->string('prefijo', 10);
            $table->string('nombre', 100);
            $table->string('continente', 16)->nullable();
            $table->string('subcontinente', 32)->nullable();
            $table->string('iso_moneda', 3)->nullable();
            $table->string('nombre_moneda', 100)->nullable();
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
        Schema::dropIfExists('paises');
    }
}
