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
        'moneda'
    ];

    public static function createC($request){
        $cliente = new Cliente();
        $cliente->cif=$request->cif;
        $cliente->nombre=$request->nombre;
        $cliente->telefono=$request->telefono;
        if($cliente->email != $request->correo){
            $cliente->email = $request->correo;
        } else{
            $cliente->correo = $cliente->correo;
        }
        $cliente->cuenta_corriente=$request->cuenta;
        $cliente->id_pais= $request->pais;
        $cliente->moneda=$request->moneda;
        $cliente->cuota_mensual=$request->importe;

        $cliente->saveOrFail();
    }

    public static function updateC($request, $id){
        $cliente = Cliente::find($id);
        $cliente->cif=$request->cif;
        $cliente->nombre=$request->nombre;
        $cliente->telefono=$request->telefono;
        $cliente->correo=$request->correo;
        $cliente->cuenta_corriente=$request->cuenta;
        $cliente->id_pais= $request->pais;
        $cliente->moneda=$request->moneda;
        $cliente->cuota_mensual=$request->importe;

        $cliente->fill($request->input())->saveOrFail();
    }

    public static function destroyC($id){
        $cliente = Cliente::find($id);
        $cliente->delete();
    }

}
