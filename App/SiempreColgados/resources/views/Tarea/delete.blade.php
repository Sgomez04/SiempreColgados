@extends("maestra")
@section('titulo', '¿Deseas eliminar esta tarea?')
@section('contenido')

    @method("PUT")
    @csrf

    <fieldset>

        <div class="form-group">
            @foreach ($clientes as $c)
                @if ($c->id_cliente == $tarea->id_cliente)
                    <p>Cliente: {{ $c->nombre }}</p>
                @endif
            @endforeach
        </div>

        <div class="form-group">
            <p>Teléfono/s contacto: {{ $tarea->telefono }}</p>
        </div>

        <div class="form-group">
            <p>Descripción: {{ $tarea->descripcion }}</p>
        </div>

        <div class="form-group">
            <p>Correo electrónico: {{ $tarea->correo }}</p>
        </div>

        <div class="form-group">
            <p>Direccion: {{ $tarea->direccion }}</p>
        </div>

        <div class="form-group">
            <p>Poblacion: {{ $tarea->poblacion }}</p>
        </div>

        <div class="form-group">
            <p>Codigo Postal: {{ $tarea->cp }}</p>
        </div>

        <div class="form-group">
            @if ($tarea->estado == 'P')
                <p>Estado: Pendiente</p>
            @elseif($tarea->estado == 'R')
                <p>Estado: Realizada</p>
            @else
                <p>Estado: Cancelada</p>
            @endif
        </div>

        <div class="form-group">
            <p>Fecha de creacion de la tarea:: {{ $tarea->fecha_crea }}</p>
        </div>

        <div class="form-group">
            @foreach ($empleados as $e)
                @if ($e->id_empleado == $tarea->operario)
                    <p>Operario encargado: {{ $e->nombre }}</p>
                @endif
            @endforeach
        </div>

        <div class="form-group">
            <p>Fecha de realización: {{ $tarea->fecha_rea }}</p>
        </div>

        <div class="form-group">
            <p>Anotaciones anteriores: {{ $tarea->anotacion_anterior }}</p>
        </div>

        <div class="form-group">
            <p>Anotaciones posteriores: {{ $tarea->anotacion_posterior }}</p>
        </div>

        <div class="form-group">
            <p>Fichero: {{ $tarea->fichero }}</p>
        </div>

        @include("notificacion")
        <div class="row mt-3 ">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <a class="btn btn-success mx-3" href="{{ url('tareas') }}">Cancelar</a>
                <a class="btn btn-danger mx-3" href="{{ route('eliminarT', $tarea->id_tarea) }}">Eliminar</a>
            </div>
        </div>


    </fieldset>

@endsection
