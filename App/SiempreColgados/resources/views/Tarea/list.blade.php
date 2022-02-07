@extends("maestra")
@section('titulo', 'Tarea')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('tareas.create') }}" class="btn btn-success mb-2">Agregar</a>
            {{-- @include("notificacion") --}}
            <table class="table table-bordered">
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
                        <th scope="col">Provincia</th>
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
                        <tr>
                            <td>
                                <a href="{{ route('tareas.edit', $t->id_tarea) }}" class="edit"><i class="material-icons"
                                        title="Editar Tarea">&#xE254;</i></a>
                                <br>
                                <br>
                                <a href="{{ route('tareas.show', $t->id_tarea) }}" class="delete"><i class="material-icons"
                                        title="Eliminar Tarea">&#xE872;</i></a>
                            </td>
                            <td>{{ $t->cliente }} </td>
                            <td>{{ $t->telefono}} </td>
                            <td><textarea cols="20" rows="5" readonly>{{ $t->descripcion }} </textarea></td>
                            <td>{{ $t->correo}}</td>
                            <td>{{ $t->direccion}}</td>
                            <td>{{ $t->poblacion}}</td>
                            <td>{{ $t->cp}}</td>
                            <td>{{ $t->provincia}}</td>
                            <td>{{ $t->estado}}</td>
                            <td>{{ $t->fecha_crea}}</td>
                            <td>{{ $t->operario}}</td>
                            <td>{{ $t->fecha_rea}}</td>
                            <td><textarea cols="20" rows="5" readonly>{{ $t->anot_anterior}}</textarea></td>
                            <td><textarea cols="20" rows="5" readonly>{{ $t->anot_posterior}}</textarea></td>
                            @if ($t->fichero != '')
                                <td><a target="_blank" href="">Ver
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
@endsection
