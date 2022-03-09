@extends("maestra")

@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/list.css') }}" />
@endsection

@section('navbar')
    <a href="{{ url('tareas') }}" class="nav-item nav-link active"><i class="fa fa-gears"></i><span>Tareas</span></a>

    <a href="{{ url('empleados') }}" class="nav-item nav-link"><i class="fa fa-id-card-o"></i><span>Empleados</span></a>

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
                <h2>Gestion <b>Tareas</b> creadas por clientes</h2>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('tareas.index') }}" class="btn btn-danger"><i class="material-icons">&#xe5c4;</i>
                    <span>Volver Atras</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td scope="col"><b> # </b></td>
                        <th scope="col">Cliente</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Poblacion</th>
                        <th scope="col">C.Postal</th>
                        <th scope="col">Estado</th>
                        <th scope="col">F.Creacion</th>
                        <th scope="col">Operario</th>
                        <th scope="col">F.Realizacion</th>
                        <th scope="col">A.Anterior</th>
                        <th scope="col">A.Posterior</th>
                        <th scope="col">Fichero</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $t)
                            <tr class="list">
                                <td>
                                    <a href="{{ route('tareas.edit', $t->id_tarea) }}" class="edit"><i
                                            class="material-icons" title="Editar Tarea">&#xE254;</i></a>
                                    <br>
                                    <br>
                                    <a href="{{ route('tareas.show', $t->id_tarea) }}" class="delete"><i
                                            class="material-icons" title="Eliminar Tarea">&#xE872;</i></a>
                                </td>
                                <td>{{ $t->cliente->nombre }} </td>
                                <td>{{ $t->telefono }} </td>
                                <td><textarea cols="15" rows="4" readonly>{{ $t->descripcion }} </textarea></td>
                                <td>{{ $t->correo }}</td>
                                <td>{{ $t->direccion }}</td>
                                <td>{{ $t->poblacion }}</td>
                                <td>{{ $t->cp }}</td>
                                @if ($t->estado == 'P')
                                    <td>Pendiente</td>
                                @elseif($t->estado == 'C')
                                    <td>Cancelada</td>
                                @else
                                    <td>Realizada</td>
                                @endif
                                <td>{{ date('d/m/Y', strtotime($t->fecha_crea)) }}
                                </td>
                                <td style="color:red">Sin Asignar</td>
                                <td>{{ $t->fecha_rea }}</td>
                                <td><textarea cols="15" rows="4" readonly>{{ $t->anotacion_anterior }}</textarea></td>
                                <td><textarea cols="15" rows="4" readonly>{{ $t->anotacion_posterior }}</textarea></td>
                                @if ($t->fichero != '')
                                    <td><a target="_blank" href="{{ url('/archivos', $t->fichero) }}">Ver
                                            archivo</a></td>
                                @else
                                    <td>Sin archivo</td>
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
        <b class="pagination"> {{ $tareas->links() }}</b>
    </div>
@endsection
