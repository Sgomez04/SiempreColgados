@extends("maestra")

@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/list.css') }}" />
@endsection

@section('navbar')
    <a href="{{ url('tareas') }}" class="nav-item nav-link"><i class="fa fa-gears"></i><span>Tareas</span></a>

    <a href="{{ url('empleados') }}" class="nav-item nav-link active"><i class="fa fa-id-card-o"></i><span>Empleados</span></a>

    <a href="{{ url('empleadosjs') }}" class="nav-item nav-link"><i class="fa fa-id-card-o"></i><span>EmpleadosJS</span></a>
    
    <a href="{{ url('cuotas') }}" class="nav-item nav-link"><i class="fa fa-book"></i><span>
            Cuotas</span></a>

    <a href="{{ url('clientes') }}" class="nav-item nav-link"><i class="fa fa-users"></i><span>
            Clientes</span></a>
@endsection

@section('contenido')
    <div class="container-xl">
        @include("notificacion")
        <div class="row table-title">
            <div class="col-sm-6">
                <h2>Gestion <b>Empleados</b></h2>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('empleados.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i>
                    <span>Añadir nuevo Empleado</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td scope="col"><b> # </b></td>
                        <th scope="col">Nombre</th>
                        {{-- <th scope="col">Contraseña</th> --}}
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
                        <tr class="list">
                            <td>
                                @if(Auth::user()->id_empleado != $e->id_empleado)

                                <a href="{{ route('empleados.edit', $e->id_empleado) }}" class="edit"><i
                                    class="material-icons" title="Editar Empleado">&#xE254;</i></a>
                                <br>
                                <br>
                                <a href="{{ route('empleados.show', $e->id_empleado) }}" class="delete"><i
                                    class="material-icons" title="Eliminar Empleado">&#xE872;</i></a>
                                    @else
                                    <a href="{{route('perfil.index')}}"  title="Perfil"><i class="fa fa-sliders"></i></a>
                                   @endif
                            </td>
                            <td>{{ $e->name }} </td>
                            <td>{{ $e->dni }}</td>
                            <td>{{ $e->email }}</td>
                            <td>{{ $e->telefono }}</td>
                            <td>{{ $e->direccion }}</td>
                            <td>{{ $fecha = date('d/m/Y',
                                strtotime($e->fecha_alta)); }}</td>
                            @if ($e->tipo == 'A')
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
    <div class="clearfix">
        <div class="hint-text">Mostrando <b>{{ $paginas['mostrar'] }}</b> de
            <b>{{ $paginas['total'] }}</b> registros
        </div>
        <b class="pagination"> {{ $empleados->links() }}</b>
        
    </div>
@endsection
