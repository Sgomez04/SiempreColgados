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
    $this->get('/')->assertStatus(200);
    }

    /** @test */
    function test_ruta_info()
    {
        $this->get('/info')->assertStatus(200);
    }

    /** @test */
    function test_ruta_mostrar_cuotas_de_un_cliente()
    {
        $response = $this->get('/clientes/userCuotas/1');
        $response->assertStatus(200);
    }

    /** @test */
    function test_ruta_formulario_crear_cuota_excepcional()
    {
        $this->get('/cuotas/createE')->assertStatus(200);
    }


    /** @test */
    function test_ruta_info_tarea_creada_cliente()
    {
        $this->get('/tareas/tareainfo')->assertStatus(200);
    }

    /** @test */
    function test_ruta_formulario_crear_tarea_por_cliente()
    {
        $response = $this->get('/tareas/tareaClient');
        $response->assertStatus(200);
    }

}
