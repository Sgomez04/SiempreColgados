<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        // DB::table('cuotas')->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        // DB::table('cuotas')->insert([
        //     'id_cuota' => '1',
        //     'concepto' => 'concepto ejemplo 1',
        //     'fecha_emision' => '2021-08-23',
        //     'importe' => '300',
        //     'pagada' => 'N',
        //     'fecha_pago' => '2022-12-23',
        //     'notas' => 'Nota ejemplo 1',
        //     'id_cliente' => '3'
        // ]);

        // DB::table('cuotas')->insert([
        //     'id_cuota' => '2',
        //     'concepto' => 'concepto ejemplo 2',
        //     'fecha_emision' => '2021-02-14',
        //     'importe' => '5430',
        //     'pagada' => 'S',
        //     'fecha_pago' => '2022-02-14',
        //     'notas' => 'Nota ejemplo 2',
        //     'id_cliente' => '3'
        // ]);
    }
}
