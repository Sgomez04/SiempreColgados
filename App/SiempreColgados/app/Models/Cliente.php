<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = "id_cliente";

    protected $fillable = [
        'nombre',
        'cif',
        'telefono',
        'correo',
        'cuenta_corriente',
        'moneda',
        'cuota_mensual',
        'id_pais'
    ];

    public function createC($request)
    {
        Cliente::created([
            'cif' => $request->cif,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'cuente_corriente' => $request->cuenta,
            'id_pais' => $request->pais,
            'moneda' => $request->moneda,
            'cuota_mensual' => $request->importe,
        ]);
    }

    public function updateC($request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->cif=$request->cif;
        $cliente->nombre=$request->nombre;
        $cliente->telefono= $request->telefono;
               if ($cliente->correo != $request->correo) {
            $cliente->correo = $request->correo;
        }
        $cliente->cuente_corriente=$request->cuenta;
        $cliente->id_pais= $request->pais;
        $cliente->moneda=$request->moneda;
        $cliente->cuota_mensual=$request->importe; 
    }

    public function destroyC($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
    }


    public function Paises()
    {
        return $this->belongsTo(Paises::class, 'id_pais');
    }
}
