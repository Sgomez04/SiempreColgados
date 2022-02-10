<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    protected $primaryKey = "id_empleado";

    protected $fillable = [
        'nombre',
        'password',
        'dni',
        'correo',
        'telefono',
        'direccion',
        'fecha_alta',
        'tipo'
    ];

    public static function createE($request){
        $empleado = new Empleado();
        $empleado->nombre=$request->nombre;
        $empleado->password=$request->password;
        $empleado->dni=$request->dni;
        $empleado->correo=$request->correo;
        $empleado->telefono=$request->telefono;
        $empleado->direccion=$request->direccion;
        $empleado->fecha_alta=$request->fechalta;
        $empleado->tipo=$request->cargo;

        $empleado->saveOrFail();
    }
    
    public static function updateE($request,$id){
        $empleado = Empleado::find($id);
        $empleado->nombre=$request->nombre;
        $empleado->password=$request->password;
        $empleado->dni=$request->dni;
        $empleado->correo=$request->correo;
        $empleado->telefono=$request->telefono;
        $empleado->direccion=$request->direccion;
        $empleado->fecha_alta=$request->fechalta;
        $empleado->tipo=$request->cargo;

        $empleado->fill($request->input())->saveOrFail();
    }
    
    public static function destroyE($id){

        $empleado = Empleado::find($id);
        $empleado->delete();
    }
}
