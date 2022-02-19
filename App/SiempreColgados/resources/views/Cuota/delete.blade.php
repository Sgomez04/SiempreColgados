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

    <a href="{{ url('cuotas') }}" class="nav-item nav-link active"><i class="fa fa-book"></i><span>
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
                <h4 class="modal-title w-100">Eliminación de la cuota:</h4>
            </div>
            <fieldset>
                <div class="form-group">
                    <p><b>Concepto:</b> {{ $cuota->concepto }}</p>
                </div>

                <div class="form-group">
                    <p><b>Fecha Emision:</b> {{ $cuota->fecha_emision }}</p>
                </div>

                <div class="form-group">
                    <p><b>Importe:</b> {{ $cuota->importe }}</p>
                </div>

                <div class="form-group">
                    @if ($cuota->pagada == 'S')
                        <b>Pagada:</b> SI</p>
                    @else
                        <p><b>Pagada:</b> NO</p>
                    @endif
                </div>

                <div class="form-group">
                    <p><b>Fecha Pago:</b> {{ $cuota->fecha_pago }}</p>
                </div>

                <div class="form-group">
                    <p><b>Notas:</b> {{ $cuota->notas }}</p>
                </div>

                <div class="form-group">
                    <?php
                    $cliente = '';
                    foreach ($clientes as $c) {
                        if ($cuota->id_cliente == $c->id_cliente) {
                            $cliente = $c;
                        }
                    }
                    ?>
                    <p><b>Cliente:</b> {{ $cliente->nombre }}</p>
                </div>
            </fieldset>
            <div class="modal-body">
                <p>¿Esta segur@ de que desea eliminar esta cuota? Esta acción no puede deshacerse</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="{{ url('cuotas') }}" class="bton btn-secondary" data-dismiss="modal">Cancelar</a>
                <a href="{{ route('eliminarC', $cuota->id_cuota) }}" class="bton btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
@endsection
