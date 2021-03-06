<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('empleados')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        DB::table('empleados')->insert([
            'id_empleado' => '1',
            'name' => 'Antonio Ramirez',
            'password' => bcrypt('ejemplo1'),
            'dni' => '75483715F',
            'email' => 'AramirezNio@gmail.com',
            'telefono' => '682746352',
            'direccion' => 'c/ inventada - Ejemplo1',
            'fecha_alta' => '2021-09-30',
            'tipo' => 'A'
        ]);

        DB::table('empleados')->insert([
            'id_empleado' => '2',
            'name' => 'Alba Perez',
            'password' => bcrypt('ejemplo2'),
            'dni' => '09237158R',
            'email' => 'PerezAlb@gmail.com',
            'telefono' => '682746352',
            'direccion' => 'c/ inventada - Ejemplo2',
            'fecha_alta' => '2022-01-26',
            'tipo' => 'O'
        ]);
    }
}
