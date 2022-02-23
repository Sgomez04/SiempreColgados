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

    <a href="{{ url('cuotas') }}" class="nav-item nav-link"><i class="fa fa-book"></i><span>
            Cuotas</span></a>

    <a href="{{ url('clientes') }}" class="nav-item nav-link active"><i class="fa fa-users"></i><span>
            Clientes</span></a>
@endsection

@section('titulo', 'Clientes')
@section('contenido')
    <div class="container-xl">
        @include("notificacion")
        <div class="row table-title">
            <div class="col-sm-6">
                <h2>Gestion <b>Clientes</b></h2>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('clientes.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i>
                    <span>Añadir nuevo Cliente</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td scope="col"><b> </b></td>
                        <th scope="col">Nombre</th>
                        <th scope="col">CIF</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Cuenta Corriente</th>
                        <th scope="col">Pais</th>
                        <th scope="col">Moneda</th>
                        <th scope="col">Cuota Mensual</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $c)
                        <tr class="list">
                            <td>
                                <a href="{{ route('clientes.edit', $c->id_cliente) }}" class="edit"><i
                                        class="material-icons" title="Editar Cliente">&#xE254;</i></a>
                                <br>
                                <br>
                                <a href="{{ route('clientes.show', $c->id_cliente) }}" class="delete"><i
                                        class="material-icons" title="Eliminar Cliente">&#xE872;</i></a>
                                <br>
                                <br>
                                <a href="{{ route('userCuotas', $c->id_cliente) }}" class="extra"><i
                                        class="material-icons" title="Ver Cuotas">&#xe417;</i></a>
                            </td>
                            <td>{{ $c->nombre }} </td>
                            <td>{{ $c->cif }} </td>
                            <td>{{ $c->telefono }}</td>
                            <td>{{ $c->correo }}</td>
                            <td>{{ $c->cuenta_corriente }}</td>
                            <td>{{ $c->paises->nombre }}</td>
                            <td>{{ $c->paises->nombre_moneda }}</td>
                            <td>{{ $c->cuota_mensual }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="clearfix">
        <div class="hint-text">Mostrando <b>{{ $paginas['mostrar'] }}</b> de
            <b>{{ $paginas['total'] }}</b> registros
        </div>
        <b class="pagination"> {{ $clientes->links() }}</b>
    </div>
@endsection
