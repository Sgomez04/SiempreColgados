@extends("maestra")
@section('titulo', 'Empleados')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('empleados.create') }}" class="btn btn-success mb-2">Agregar</a>
            @include("notificacion")
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td scope="col"><b> # </b></td>
                        <th scope="col">Nombre</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Fecha Alta</th>
                        <th scope="col">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $e)
                        <tr>
                            <td>
                                <a href="{{ route('empleados.edit', $e->id_empleado) }}" class="edit"><i class="material-icons"
                                        title="Editar empleado">&#xE254;</i></a>
                                <br>
                                <br>
                                <a href="{{ route('empleados.show', $e->id_empleado) }}" class="delete"><i class="material-icons"
                                        title="Eliminar empleado">&#xE872;</i></a>
                            </td>
                            <td>{{ $e->nombre }} </td>
                            <td>{{ $e->password}} </td>
                            <td>{{ $e->dni}}</td>
                            <td>{{ $e->correo}}</td>
                            <td>{{ $e->telefono}}</td>
                            <td>{{ $e->direccion}}</td>
                            <td>{{ $e->fecha_alta}}</td>
                            <td>{{ $e->tipo}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
