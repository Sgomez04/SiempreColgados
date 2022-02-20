<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class rutasTest extends TestCase
{
    /** @test */
    function test_ruta_index()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    function test_ruta_info()
    {
        $response = $this->get('/info');
        $response->assertStatus(200);
    }

    /** @test */
    function test_ruta_home()
    {
        $response = $this->get('/home');
        $response->assertStatus(200);
    }

    /** @test */
    function test_ruta_login_con_apis()
    {
        $response = $this->get('/externalLogin/google');
        $response->assertStatus(200);
    }

    /** @test */
    function test_ruta_redireccion_login_apis()
    {
        $response = $this->get('/Loginredirect/google');
        $response->assertStatus(200);
    }

    /** @test */
    function test_ruta_confirmar_borrar_cliente()
    {
        $response = $this->get('/clientes/eliminarCi/3');
        $response->assertStatus(200);
    }

    /** @test */
    function test_ruta_mostrar_cuotas_de_un_cliente()
    {
        $response = $this->get('/clientes/userCuotas/1');
        $response->assertStatus(200);
    }

    /** @test */
    function test_ruta_mostrar_factura()
    {
        $response = $this->get('/factura/printInvoice/1');
        $response->assertStatus(200);
    }

    /** @test */
    function test_ruta_formulario_crear_cuota_excepcional()
    {
        $response = $this->get('/cuotas/createE');
        $response->assertStatus(200);
    }

    // /** @test */
    // function test_ruta_crear_cuota_excepcional()
    // {
    //     $response = $this->get('/cuotas/storeE');
    //     $response->assertStatus(200);
    // }

    /** @test */
    function test_ruta_confirmar_eliminar_cuota()
    {
        $response = $this->get('/cuotas/eliminarC/1');
        $response->assertStatus(200);
    }

    /** @test */
    function test_ruta_confirmar_eliminar_empleado()
    {
        $response = $this->get('/empleados/eliminarE/3');
        $response->assertStatus(200);
    }

    /** @test */
    function test_ruta_confirmar_eliminar_tarea()
    {
        $response = $this->get('/tareas/eliminarT/1');
        $response->assertStatus(200);
    }

    /** @test */
    function test_ruta_info_tarea_creada_cliente()
    {
        $response = $this->get('/tareas/tareainfo');
        $response->assertStatus(200);
    }

    // /** @test */
    // function test_ruta_formulario_crear_tarea_por_cliente()
    // {
    //     $response = $this->get('/tareas/tareaClient');
    //     $response->assertStatus(200);
    // }

    /** @test */
    function test_ruta_crear_tarea_por_cliente()
    {
        $response = $this->get('/tareas/tareaClientCreate');
        $response->assertStatus(200);
    }

    // /** @test */
    // function test_ruta_mostrar_archivo_pdf()
    // {
    //     $response = $this->get('/archivos/{archivo}');
    //     $response->assertStatus(200);
    // }
}