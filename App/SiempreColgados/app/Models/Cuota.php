<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    use HasFactory;
    protected $table = 'cuotas';
    protected $primaryKey = "id_cuota";

    protected $fillable = [
        'concepto',
        'fecha_emision',
        'importe',
        'pagada',
        'fecha_pago',
        'notas',
        'id_cliente'

    ];

    public static function createM($request, $clientes)
    {
            foreach($clientes as $c){
                $cuota = new Cuota();
                $cuota->concepto = $request->concepto;
                $cuota->fecha_emision = $request->fechaemision;
                $cuota->importe = $c->cuota_mensual;
                $cuota->pagada = $request->pagada;
                $cuota->fecha_pago = $request->fechapago;
                $cuota->notas = $request->notas;
                $cuota->tipo = $request->tipo;
                $cuota->id_cliente = $c->id_cliente;
                $cuota->saveOrFail();
            }
    }

    public static function createE($request, $clientes)
    {
                $cuota = new Cuota();
                $cuota->concepto = $request->concepto;
                $cuota->fecha_emision = $request->fechaemision;
                $cuota->importe = $request->importe;
                $cuota->pagada = $request->pagada;
                $cuota->fecha_pago = $request->fechapago;
                $cuota->notas = $request->notas;
                $cuota->tipo = $request->tipo;
                $cuota->id_cliente = $request->cliente;
                $cuota->saveOrFail();
    }


    public static function updateC($request, $id)
    {
        $cuota = Cuota::find($id);
        $cuota->concepto = $request->concepto;
        $cuota->fecha_emision = $request->fechaemision;
        $cuota->importe = $request->importe;
        $cuota->pagada = $request->pagada;
        $cuota->fecha_pago = $request->fechapago;
        $cuota->notas = $request->notas;
        $cuota->id_cliente = $request->cliente;
        $cuota->fill($request->input())->saveOrFail();
    }

    public static function destroyC($id)
    {
        $cuota = Cuota::find($id);
        $cuota->delete();
    }
}
