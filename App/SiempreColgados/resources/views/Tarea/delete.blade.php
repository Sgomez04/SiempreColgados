@extends("maestra")

@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/confirm-delete.css') }}" />
@endsection

@section('navbar')
    <a href="{{ url('tareas') }}" class="nav-item nav-link active"><i class="fa fa-gears"></i><span>Tareas</span></a>

    <a href="{{ url('empleados') }}" class="nav-item nav-link"><i class="fa fa-id-card-o"></i><span>Empleados</span></a>

    <a href="{{ url('cuotas') }}" class="nav-item nav-link"><i class="fa fa-book"></i><span>
            Cuotas</span></a>

    <a href="{{ url('clientes') }}" class="nav-item nav-link"><i class="fa fa-users"></i><span>
            Clientes</span></a>
@endsection

@section('contenido')
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <h4 class="modal-title w-100">Eliminación de la tarea:</h4>
            </div>
            <fieldset>
                <div class="form-group">
                    @foreach ($clientes as $c)
                        @if ($c->id_cliente == $tarea->id_cliente)
                            <p><b>Cliente:</b> {{ $c->nombre }}</p>
                        @endif
                    @endforeach
                </div>

                <div class="form-group">
                    <p><b>Teléfono/s contacto:</b> {{ $tarea->telefono }}</p>
                </div>

                <div class="form-group">
                    <p><b>Descripción:</b> {{ $tarea->descripcion }}</p>
                </div>

                <div class="form-group">
                    <p><b>Correo electrónico:</b> {{ $tarea->correo }}</p>
                </div>

                <div class="form-group">
                    <p><b>Direccion:</b> {{ $tarea->direccion }}</p>
                </div>

                <div class="form-group">
                    <p><b>Poblacion:</b> {{ $tarea->poblacion }}</p>
                </div>

                <div class="form-group">
                    <p><b>Codigo Postal:</b> {{ $tarea->cp }}</p>
                </div>

                <div class="form-group">
                    @if ($tarea->estado == 'P')
                        <p><b>Estado:</b> Pendiente</p>
                    @elseif($tarea->estado == 'R')
                        <p><b>Estado:</b> Realizada</p>
                    @else
                        <p><b>Estado:</b> Cancelada</p>
                    @endif
                </div>

                <div class="form-group">
                    <p><b>Fecha de creacion de la tarea:</b> {{ $tarea->fecha_crea }}</p>
                </div>

                <div class="form-group">
                    @foreach ($empleados as $e)
                        @if ($e->id_empleado == $tarea->operario)
                            @if ($e->nombre == null)
                                <p><b>Operario encargado:</b> Sin asignar</p>
                            @else{
                                <p><b>Operario encargado:</b> {{$e->nombre}}</p>
                                }
                            @endif
                        @endif
                    @endforeach
                </div>

                <div class="form-group">
                    <p><b>Fecha de realización:</b> {{ $tarea->fecha_rea }}</p>
                </div>

                {{-- <div class="form-group">
                    <p>Anotaciones anteriores: {{ $tarea->anotacion_anterior }}</p>
                </div>

                <div class="form-group">
                    <p>Anotaciones posteriores: {{ $tarea->anotacion_posterior }}</p>
                </div>

                <div class="form-group">
                    <p>Fichero: {{ $tarea->fichero }}</p>
                </div> --}}
            </fieldset>
            <div class="modal-body">
                <p>¿Esta segur@ de que desea eliminar la tarea? Esta acción no puede deshacerse</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="{{ url('tareas') }}" class="bton btn-secondary" data-dismiss="modal">Cancelar</a>
                <a href="{{ route('eliminarT', $tarea->id_tarea) }}" class="bton btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
@endsection
