@extends("maestra")

@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/confirm-delete.css') }}" />
@endsection

@section('navbar')
    <a href="{{ url('tareas') }}" class="nav-item nav-link"><i class="fa fa-gears"></i><span>Tareas</span></a>

    <a href="{{ url('empleados') }}" class="nav-item nav-link active"><i class="fa fa-id-card-o"></i><span>Empleados</span></a>

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
                <h4 class="modal-title w-100">Eliminación del empleado:</h4>
            </div>
        <fieldset>
            <div class="form-group">
                <p><b>Nombre:</b> {{ $empleado->name }}</p>
            </div>

            <div class="form-group">
                <p><b>DNI:</b> {{ $empleado->dni }}</p>
            </div>

            <div class="form-group">
                <p><b>Correo electrónico:</b> {{ $empleado->email }}</p>
            </div>

            <div class="form-group">
                <p><b>Telefono:</b> {{ $empleado->telefono }}</p>
            </div>

            <div class="form-group">
                <p><b>Direccion:</b> {{ $empleado->direccion }}</p>
            </div>
        
            <div class="form-group">
                <p><b>Fecha de alta del empleado:</b> {{ $empleado->fecha_alta }}</p>
            </div>
        
            <div class="form-group">
                @if ($empleado->tipo == 'A')   
                <p><b>Cargo del empleado:</b> Administrador</p>
                @else
                <p><b>Cargo del empleado:</b> Operario</p>
                @endif
            </div>
        </fieldset>
        <div class="modal-body">
            <p>¿Esta segur@ de que desea eliminar este empleado? Esta acción no puede deshacerse</p>
        </div>
        <div class="modal-footer justify-content-center">
            <a href="{{ url('empleados') }}" class="bton btn-secondary" data-dismiss="modal">Cancelar</a>
            <a href="{{ route('eliminarE' , $empleado->id_empleado) }}" class="bton btn-danger">Eliminar</a>
        </div>
    </div>
</div>
@endsection
