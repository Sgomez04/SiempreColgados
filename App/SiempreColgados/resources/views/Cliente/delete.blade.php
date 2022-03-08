@extends("maestra")

@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/confirm-delete.css') }}" />
@endsection

@section('navbar')
    <a href="{{ url('tareas') }}" class="nav-item nav-link"><i class="fa fa-gears"></i><span>Tareas</span></a>

    <a href="{{ url('empleados') }}" class="nav-item nav-link"><i class="fa fa-id-card-o"></i><span>Empleados</span></a>

    <a href="{{ url('empleadosjs') }}" class="nav-item nav-link"><i class="fa fa-id-card-o"></i><span>EmpleadosJS</span></a>
    
    <a href="{{ url('cuotas') }}" class="nav-item nav-link"><i class="fa fa-book"></i><span>
            Cuotas</span></a>

    <a href="{{ url('clientes') }}" class="nav-item nav-link active"><i class="fa fa-users"></i><span>
            Clientes</span></a>
@endsection

@section('contenido')
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <h4 class="modal-title w-100">Eliminación del cliente:</h4>
            </div>
            <fieldset>
                <div class="form-group">
                    <p><b>Nombre:</b> {{ $cliente->nombre }}</p>
                </div>

                <div class="form-group">
                    <p><b>CIF:</b> {{ $cliente->cif }}</p>
                </div>

                <div class="form-group">
                    <p><b>Telefono:</b> {{ $cliente->telefono }}</p>
                </div>

                <div class="form-group">
                    <p><b>Correo electrónico:</b> {{ $cliente->correo }}</p>
                </div>

                <div class="form-group">
                    <p><b>Cuenta Corriente:</b> {{ $cliente->cuenta_corriente }}</p>
                </div>

                <div class="form-group">
                    @foreach ($paises as $p)
                        @if ($p->id == $cliente->id_pais)
                            <p><b>Pais:</b> {{ $p->nombre }}</p>
                        @endif
                    @endforeach
                </div>

                <div class="form-group">
                    @foreach ($paises as $p)
                        @if ($p->iso_moneda == $cliente->moneda)
                            <p><b>Moneda:</b> {{ $p->nombre_moneda }}</p>
                        @break
                    @endif
                    @endforeach

                </div>

                <div class="form-group">
                    <p><b>Importe Cuota Mensual:</b> {{ $cliente->mensual }}</p>
                </div>
            </fieldset>
            <div class="modal-body">
                <p>¿Esta segur@ de que desea eliminar este cliente? Esta acción no puede deshacerse</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="{{ url('clientes') }}" class="bton btn-secondary" data-dismiss="modal">Cancelar</a>
                <a href="{{ route('eliminarCi', $cliente->id_cliente) }}" class="bton btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
@endsection
