@extends("maestra")
@section('titulo', 'Clientes')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('clientes.create') }}" class="btn btn-success mb-2">Agregar</a>
            @include("notificacion")
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td scope="col"><b> # </b></td>
                        <th scope="col">Nombre</th>
                        <th scope="col">CIF</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Cuenta Corriente</th>
                        <th scope="col">Moneda</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $c)
                        <tr>
                            <td>
                                <a href="{{ route('clientes.edit', [$c->id]) }}" class="edit"><i class="material-icons"
                                        title="Editar cliente">&#xE254;</i></a>
                                <br>
                                <br>
                                {{-- <a href="{{ route('clientes.delete', [$c->id]) }}" class="delete"><i class="material-icons"
                                        title="Eliminar cliente">&#xE872;</i></a> --}}
                            </td>
                            <td>{{ $c->nombre }} </td>
                            <td>{{ $c->cif}} </td>
                            <td>{{ $c->telefono}}</td>
                            <td>{{ $c->correo}}</td>
                            <td>{{ $c->cuenta_corriente}}</td>
                            <td>{{ $c->moneda}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
