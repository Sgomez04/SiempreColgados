<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); 
        DB::table('clientes')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        DB::table('clientes')->insert([
            'cif' => 'F – 25355779',
            'nombre' => 'Manuel Gonzalez',
            'telefono' => '675834212',
            'correo' => 'manuelglez@gmail.com',
            'cuenta_corriente' => '1235 7854 8127 7827',
            'id_pais' => '020',
            'moneda' => 'EUR',
            'cuota_mensual' => '243'
        ]);

        DB::table('clientes')->insert([
            'cif' => 'B – 76365789',
            'nombre' => 'Maria Fernandez',
            'telefono' => '756438192',
            'correo' => 'MariaFdez@gmail.com',
            'cuenta_corriente' => '4738 2837 4812 0695',
            'id_pais' => '032',
            'moneda' => 'ARS',
            'cuota_mensual' => '254'
        ]);

        DB::table('clientes')->insert([
            'cif' => 'R – 17284921',
            'nombre' => 'Mateo Gomez',
            'telefono' => '756438192',
            'correo' => 'MateGomez@gmail.com',
            'cuenta_corriente' => '4738 2837 4812 0695',
            'id_pais' => '724',
            'moneda' => 'EUR',
            'cuota_mensual' => '542'
        ]);
    }
}
