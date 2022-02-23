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
    ];

    public function createM($request, $clientes)
    {
        foreach ($clientes as $c) {
            Cuota::created([
                'concepto' => $request->concepto,
                'fecha_emision' => $request->fechaemision,
                'importe' => $c->cuota_mensual,
                'pagada' => $request->pagada,
                'fecha_pago' => $request->fechapago,
                'notas' => $request->notas,
                'tipo' => $request->tipo,
                'id_cliente' =>  $c->id_cliente,
            ]);
        }
    }

    public function createE($request)
    {
        Cuota::created([
            'concepto' => $request->concepto,
            'fecha_emision' => $request->fechaemision,
            'importe' => $request->importe,
            'pagada' => $request->pagada,
            'fecha_pago' => $request->fechapago,
            'notas' => $request->notas,
            'tipo' => $request->tipo,
            'id_cliente' => $request->cliente,
        ]);
    }


    public function updateC($request, $id)
    {
        Cuota::find($id)->update([
            'concepto' => $request->concepto,
            'fecha_emision' => $request->fechaemision,
            'importe' => $request->importe,
            'pagada' => $request->pagada,
            'fecha_pago' => $request->fechapago,
            'notas' => $request->notas,
            'id_cliente' => $request->cliente,
        ]);

    }

    public function destroyC($id)
    {
        $cuota = Cuota::find($id);
        $cuota->delete();
    }

    public function Cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
