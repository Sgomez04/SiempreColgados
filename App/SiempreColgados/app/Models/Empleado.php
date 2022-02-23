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

    public function createE($request){
        Empleado::created([
            'name' => $request->nombre,
            'password' => bcrypt($request->password),
            'dni' => $request->dni ,
            'email' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'fecha_alta' => $request->fechalta,
            'tipo' => $request->cargo,
        ]);
    }
    
    public function updateE($request,$id){
        Empleado::find($id)->update([
            'name' => $request->nombre,
            // 'password' => bcrypt($request->password),
            'dni' => $request->dni ,
            'email' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'fecha_alta' => $request->fechalta,
            'tipo' => $request->cargo,  
        ]);

        // if($empleado->email != $request->correo){
        //     $empleado->email = $request->correo;
        // }
    }

    public static function destroyE($id){

        $empleado = Empleado::find($id);
        
        $empleado->delete();
    }
    

}
