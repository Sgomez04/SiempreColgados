<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('tareas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        DB::table('tareas')->insert([
            'id_cliente' => '1',
            'telefono' => '682746352',
            'descripcion' => 'Descripcion ejemplo 1',
            'correo' => 'AramirezNio@gmail.com',
            'direccion' => 'c/ inventada - Ejemplo1',
            'poblacion' => 'Inventada',
            'cp' => '23412',
            'estado' => 'P',
            'fecha_crea' => '2021-09-30',
            'operario' => '2',
            'fecha_rea' => '2022-01-30',
            'anotacion_anterior' => 'Anotacion ejemplo 1',
            'anotacion_posterior' => 'Anotacion ejemplo 1',
            'fichero' => ''
        ]);

        
        DB::table('tareas')->insert([
            'id_cliente' => '2',
            'telefono' => '622746582',
            'descripcion' => 'Descripcion ejemplo 2',
            'correo' => 'ejemplo@gmail.com',
            'direccion' => 'c/ inventada - Ejemplo2',
            'poblacion' => 'Inventada',
            'cp' => '58412',
            'estado' => 'R',
            'fecha_crea' => '2021-09-30',
            'operario' => '2',
            'fecha_rea' => '2022-01-30',
            'anotacion_anterior' => 'Anotacion ejemplo 1',
            'anotacion_posterior' => 'Anotacion ejemplo 1',
            'fichero' => ''
        ]);
    }

    
}
