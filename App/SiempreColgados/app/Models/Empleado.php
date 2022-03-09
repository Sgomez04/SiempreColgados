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
        'name',
        'password',
        'dni',
        'email',
        'telefono',
        'direccion',
        'fecha_alta',
        'tipo'
    ];

    public static function createE($request)
    {
        // Empleado::created([
        //     'name' => $request->nombre,
        //     'password' => bcrypt($request->password),
        //     'dni' => $request->dni,
        //     'email' => $request->correo,
        //     'telefono' => $request->telefono,
        //     'direccion' => $request->direccion,
        //     'fecha_alta' => $request->fechalta,
        //     'tipo' => $request->cargo,
        // ]);

        $empleado = new Empleado();
        $empleado->name = $request->nombre;
        $empleado->password = bcrypt($request->password);
        $empleado->dni = $request->dni;
        $empleado->email = $request->correo;
        $empleado->telefono = $request->telefono;
        $empleado->direccion = $request->direccion;
        $empleado->fecha_alta = date('Y-m-d', time());
        $empleado->tipo = $request->cargo;

        $empleado->saveOrFail();

    }

    public static function updateE($request, $id)
    {
        $empleado = Empleado::find($id);;

        $empleado->dni = $request->dni;
        if ($empleado->email != $request->correo) {
            $empleado->email = $request->correo;
        }
        $empleado->telefono = $request->telefono;
        $empleado->direccion = $request->direccion;
        $empleado->fecha_alta = $request->fechalta;
        $empleado->tipo = $request->cargo;

        $empleado->saveOrFail();

    }

    public static function destroyE($id)
    {

        $empleado = Empleado::find($id);

        $empleado->delete();
    }
}
