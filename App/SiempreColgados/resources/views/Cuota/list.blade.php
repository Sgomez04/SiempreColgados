@extends("maestra")

@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/list.css') }}" />
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
    <div class="container-xl">
        {{-- @include("notificacion") --}}
        <div class="row table-title">
            <div class="col-sm-6">
                <h2>Gestion <b>Cuotas</b></h2>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('cuotas.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i>
                    <span>Añadir Cuotas Mensuales</span></a>
                <a href="{{ route('createE') }}" class="btn btn-secondary"><i class="material-icons">&#xE147;</i>
                    <span>Añadir Cuota Excepcional</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td scope="col"><b> # </b></td>
                        <th scope="col">Concepto</th>
                        <th scope="col">Fecha Emision</th>
                        <th scope="col">Importe</th>
                        <th scope="col">Pagada</th>
                        <th scope="col">Fecha Pago</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Notas</th>
                        <th scope="col">Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cuotas as $c)
                        <tr class="list">
                            <td>
                                <a href="{{ route('cuotas.edit', $c->id_cuota) }}" class="edit"><i
                                        class="material-icons" title="Editar Tarea">&#xE254;</i></a>
                                <br>
                                <br>
                                <a href="{{ route('cuotas.show', $c->id_cuota) }}" class="delete"><i
                                        class="material-icons" title="Eliminar Tarea">&#xE872;</i></a>
                                <br>
                                <br>
                                <a href="{{ route('printInvoice', $c->id_cuota) }}" class="extra"><i
                                        class="material-icons" title="Factura PDF">&#xe89c;</i></a>
                            </td>
                            <td>{{ $c->concepto }} </td>
                            <td>{{ $c->fecha_emision }} </td>
                            <td>{{ $c->importe }}</td>
                            @if ($c->pagada == 'S')
                                <td>Pagada</td>
                            @else
                                <td>No Pagada</td>
                            @endif
                            <td>{{ $c->fecha_pago }}</td>
                            <td>{{ $c->tipo }}</td>
                            <td><textarea cols="20" rows="5" readonly>{{ $c->notas }}</textarea></td>
                            <?php
                            foreach ($clientes as $client) {
                                if ($c->id_cliente == $client->id_cliente) {
                                    $cliente = $client->nombre;
                                }
                            }
                            ?>
                            <td>{{ $cliente }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <p>Paginacion</p>
        {{ $cuotas->links() }}
    </div>
@endsection
