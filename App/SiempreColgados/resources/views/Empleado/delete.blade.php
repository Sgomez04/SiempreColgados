@extends("maestra")
@section('titulo', '¿Deseas eliminar a este empleado?')
@section('contenido')

        @method("PUT")
        @csrf
        <fieldset>
            <div class="form-group">
                <p>Nombre: {{ $empleado->nombre }}</p>
            </div>
        
            <div class="form-group">
                <p>Contraseña: {{ $empleado->password }}</p>
            </div>

            <div class="form-group">
                <p>DNI: {{ $empleado->dni }}</p>
            </div>

            <div class="form-group">
                <p>Correo electrónico: {{ $empleado->correo }}</p>
            </div>

            <div class="form-group">
                <p>Telefono: {{ $empleado->telefono }}</p>
            </div>

            <div class="form-group">
                <p>Direccion: {{ $empleado->direccion }}</p>
            </div>
        
            <div class="form-group">
                <p>Fecha de alta del empleado: {{ $empleado->fecha_alta }}</p>
            </div>
        
            <div class="form-group">
                @if ($empleado->tipo == 'A')   
                <p>Cargo del empleado: Administrador</p>
                @else
                <p>Cargo del empleado: Operario</p>
                @endif
            </div>
        
            @include("notificacion")
            <div class="row mt-3 ">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <a class="btn btn-success mx-3" href="{{ url('empleados') }}">Cancelar</a>
                    <a class="btn btn-danger mx-3" href="{{ route('eliminarE' , $empleado->id_empleado) }}">Eliminar</a>
                </div>
            </div>

        </fieldset>
@endsection
