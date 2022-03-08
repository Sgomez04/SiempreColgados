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
        'id_cliente',
        'tipo',
        'importe_moneda_cliente'
    ];

    public static function createM($request, $clientes)
    {
        foreach ($clientes as $c) {
            // Cuota::created([
            //     'concepto' => $request->concepto,
            //     'fecha_emision' => $request->fechaemision,
            //     'importe' => $c->cuota_mensual,
            //     'pagada' => $request->pagada,
            //     'fecha_pago' => $request->fechapago,
            //     'notas' => $request->notas,
            //     'tipo' => $request->tipo,
            //     'id_cliente' =>  $c->id_cliente,
            // ]);

            $cuota = new Cuota();
            $cuota->concepto = $request->concepto;
            $cuota->fecha_emision = $request->fechaemision;
            $cuota->importe = $c->cuota_mensual;
            $cuota->pagada = $request->pagada;
            $cuota->fecha_pago = $request->fechapago;
            $cuota->notas = $request->notas;
            $cuota->tipo = "Mensual";
            $cuota->id_cliente =  $c->id_cliente;
            $cuota->importe_moneda_cliente = CambioDivisa::toEuros($c->cuota_mensual, strtolower($c->moneda));

            $cuota->fill($request->input())->saveOrFail();
        }
    }

    public static function createE($request)
    {
        // Cuota::created([
        //     'concepto' => $request->concepto,
        //     'fecha_emision' => $request->fechaemision,
        //     'importe' => $request->importe,
        //     'pagada' => $request->pagada,
        //     'fecha_pago' => $request->fechapago,
        //     'notas' => $request->notas,
        //     'tipo' => $request->tipo,
        //     'id_cliente' => $request->cliente,
        // ]);
        $cliente = Cliente::find($request->cliente);
        $cuota = new Cuota();
        $cuota->concepto = $request->concepto;
        $cuota->fecha_emision = $request->fechaemision;
        $cuota->importe =  $request->importe;
        $cuota->pagada = $request->pagada;
        $cuota->fecha_pago = $request->fechapago;
        $cuota->notas = $request->notas;
        $cuota->tipo = "Excepcional";
        $cuota->id_cliente =  $request->cliente;
        $cuota->importe_moneda_cliente = CambioDivisa::toEuros($request->cuota_mensual, strtolower($cliente->moneda));


        $cuota->fill($request->input())->saveOrFail();

    }


    public static function updateC($request, $id)
    {
        // Cuota::find($id)->update([
        //     'concepto' => $request->concepto,
        //     'fecha_emision' => $request->fechaemision,
        //     'importe' => $request->importe,
        //     'pagada' => $request->pagada,
        //     'fecha_pago' => $request->fechapago,
        //     'notas' => $request->notas,
        //     'id_cliente' => $request->cliente,
        // ]);

        $cuota = Cuota::find($id);
        $cuota->concepto = $request->concepto;
        $cuota->fecha_emision = $request->fechaemision;
        $cuota->importe =  $request->importe;
        $cuota->pagada = $request->pagada;
        $cuota->fecha_pago = $request->fechapago;
        $cuota->notas = $request->notas;
        $cuota->id_cliente =  $request->cliente;

        $cuota->fill($request->input())->saveOrFail();

    }

    public static function destroyC($id)
    {
        $cuota = Cuota::find($id);
        $cuota->delete();
    }

    public function Cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
