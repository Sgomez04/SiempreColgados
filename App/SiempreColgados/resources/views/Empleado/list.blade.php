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
                                <a href="{{ route('empleados.edit', $e->id_empleado) }}"  class="btn btn-warning"><i class="far fa-edit">Modificar</i></a>
                                <br>
                                <br>
                                <a href="{{ route('empleados.show', $e->id_empleado) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i>   Eliminar</a>
                            </td>
                            <td>{{ $e->nombre }} </td>
                            <td>{{ $e->password}} </td>
                            <td>{{ $e->dni}}</td>
                            <td>{{ $e->correo}}</td>
                            <td>{{ $e->telefono}}</td>
                            <td>{{ $e->direccion}}</td>
                            <td>{{ $e->fecha_alta}}</td>
                            @if ($e->tipo == "A")
                            <td>Administrador</td>
                            @else
                            <td>Operario</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        {{ $empleados->links() }}
    </div>
@endsection
