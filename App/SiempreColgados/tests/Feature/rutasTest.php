<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Cliente;
use App\Models\Cuota;
use App\Models\Empleado;
use App\Models\Tarea;
use App\Models\User;


use Tests\TestCase;

class rutasTest extends TestCase
{
    //---OTRAS RUTAS---//

    /** @test */
    function test_ruta_index()
    {
        $this->get('/')->assertStatus(200);
    }

    /** @test */
    function test_ruta_info()
    {
        $invitado = User::where('id_empleado', 3)->first();
        $this->actingAs($invitado)->get('/info')->assertStatus(200);
    }


    //---TAREAS---//

    //sin logear//
    /** @test */
    function test_ruta_info_tarea_creada_cliente()
    {
        $this->get('/tareas/tareainfo')->assertStatus(200);
    }

    /** @test */
    function test_ruta_formulario_crear_tarea_por_cliente()
    {
        $this->get('/tareas/tareaClient')->assertStatus(200);
    }

    //admin
    /** @test */
    function test_ruta_lista_tareas_de_clientes()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/tareas/tareaslistCliente')->assertStatus(200);
    }

    // /** @test */
    // function test_ruta_eliminar_tarea()
    // {
    //     $admin = User::where('id_empleado', 1)->first();
    //     $this->actingAs($admin)->get('/tareas/eliminarT/1')->assertStatus(200);
    // }

    /** @test */
    function test_ruta_lista_tareas()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/tareas')->assertStatus(200);
    }

    /** @test */
    function test_ruta_formulario_nueva_tarea()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/tareas/create')->assertStatus(200);
    }

    /** @test */
    function test_ruta_formulario_editar_tarea()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/tareas/1/edit')->assertStatus(200);
    }

    /** @test */
    function test_ruta_confirmar_eliminado_tarea()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/tareas/1')->assertStatus(200);
    }

    // /** @test */
    // function test_ruta_actualizar_tarea()
    // {
    //     $admin = User::where('id_empleado', 1)->first();
    //     $this->actingAs($admin)->get('/tareas/1/uptadate')->assertStatus(200);
    // }

    // /** @test */
    // function test_ruta_crear_tarea()
    // {
    //     $admin = User::where('id_empleado', 1)->first();
    //     $this->actingAs($admin)->get('/tareas/store')->assertStatus(200);
    // }

    //operario
    /** @test */
    function test_ruta_lista_tareas_operarios()
    {
        $operario = User::where('id_empleado', 2)->first();
        $this->actingAs($operario)->get('/tareasOp')->assertStatus(200);
    }

    /** @test */
    function test_ruta_formulario_editar_tareas_operarios()
    {
        $operario = User::where('id_empleado', 2)->first();
        $this->actingAs($operario)->get('/tareasOp/1/edit')->assertStatus(200);
    }

    // /** @test */
    // function test_ruta_formulario_actualizar_tareas_operarios()
    // {
    //     $operario = User::where('id_empleado', 2)->first();
    //     $this->actingAs($operario)->get('/tareasOp/1/update')->assertStatus(200);
    // }

    //---EMPLEADOS---//

    // /** @test */
    // function test_ruta_eliminar_empleado()
    // {
    //     $admin = User::where('id_empleado', 1)->first();
    //     $this->actingAs($admin)->get('/empleados/eliminarE/4')->assertStatus(200);
    // }

    /** @test */
    function test_ruta_lista_empleados()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/empleados')->assertStatus(200);
    }

    /** @test */
    function test_ruta_formulario_nuevo_empleado()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/empleados/create')->assertStatus(200);
    }

    /** @test */
    function test_ruta_furmulario_edit_empleado()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/empleados/4/edit')->assertStatus(200);
    }

    /** @test */
    function test_ruta_confirmar_eliminar_empleado()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/empleados/4')->assertStatus(200);
    }

    // /** @test */
    // function test_ruta_actualizar_empleado()
    // {
    //     $admin = User::where('id_empleado', 1)->first();
    //     $this->actingAs($admin)->get('/empleados/4/update')->assertStatus(200);
    // }

    //---CLIENTES---//

    /** @test */
    function test_ruta_mostrar_cuotas_de_un_cliente()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/clientes/userCuotas/1')->assertStatus(200);
    }

    /** @test */
    function test_ruta_lista_clientes()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/clientes')->assertStatus(200);
    }

    /** @test */
    function test_ruta_formulario_crear_cliente()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/clientes/create')->assertStatus(200);
    }

    /** @test */
    function test_ruta_formulario_editar_cliente()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/clientes/1/edit')->assertStatus(200);
    }

    /** @test */
    function test_ruta_confirmacion_borrado_cliente()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/clientes/1')->assertStatus(200);
    }

    // /** @test */
    // function test_ruta_crear_cliente()
    // {
    //     $admin = User::where('id_empleado', 1)->first();
    //     $this->actingAs($admin)->get('/clientes/store')->assertStatus(200);
    // }

    // /** @test */
    // function test_ruta_editar_cliente()
    // {
    //     $admin = User::where('id_empleado', 1)->first();
    //     $this->actingAs($admin)->get('/clientes/1/update')->assertStatus(200);
    // }

    // /** @test */
    // function test_ruta_borrar_cliente()
    // {
    //     $admin = User::where('id_empleado', 1)->first();
    //     $this->actingAs($admin)->get('/clientes/eliminarCi/1')->assertStatus(200);
    // }

    //---CUOTAS---//

    /** @test */
    function test_ruta_lista_cuotas()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/cuotas')->assertStatus(200);
    }

    /** @test */
    function test_ruta_formulario_crear_cuota_excepcional()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/cuotas/createE')->assertStatus(200);
    }

    /** @test */
    function test_ruta_formulario_edit_cuota_excepcional()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/cuotas/createE')->assertStatus(200);
    }

    /** @test */
    function test_ruta_formulario_crear_cuota_mensual()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/cuotas/createE')->assertStatus(200);
    }

    /** @test */
    function test_ruta_formulario_edit_cuota_mensual()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/cuotas/createE')->assertStatus(200);
    }

    /** @test */
    function test_ruta_confirmacion_eliminacion_cuota()
    {
        $admin = User::where('id_empleado', 1)->first();
        $this->actingAs($admin)->get('/cuotas/2')->assertStatus(200);
    }

    // /** @test */
    // function test_ruta_eliminar_cuota()
    // {
    //     $admin = User::where('id_empleado', 1)->first();
    //     $this->actingAs($admin)->get('/cuotas/eliminarC/1')->assertStatus(200);
    // }

    // /** @test */
    // function test_ruta_crear_cuota()
    // {
    //     $admin = User::where('id_empleado', 1)->first();
    //     $this->actingAs($admin)->get('/cuotas/store')->assertStatus(200);
    // }

    // /** @test */
    // function test_ruta_actualizar_cuota()
    // {
    //     $admin = User::where('id_empleado', 1)->first();
    //     $this->actingAs($admin)->get('/cuotas/2/update')->assertStatus(200);
    // }
}
