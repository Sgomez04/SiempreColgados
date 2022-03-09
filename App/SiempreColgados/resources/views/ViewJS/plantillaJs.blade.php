<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css" />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/listJS.css') }}" />

</head>
<style>
    .alert-message {
        color: red;
    }

</style>

<body>

    <div class="container">
        <h2 style="margin-top: 12px;" class="alert alert-success table-title">Gestion de <b>Empleados</b> - JS
        </h2><br>
        <div class="row">
            <div class="col-12 text-right">
                <a href="javascript:void(0)" class="btn btn-success mb-3" id="create-new-post" onclick="addPost()">Añadir
                    Empleado</a>
            </div>
        </div>
        <div class="row" style="clear: both;margin-top: 18px;">
            <div class="col-12">
                <table id="empleados" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Fecha de alta</th>
                            <th>Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                            <tr id="row_{{ $empleado->id_empleado }}" class="list">
                                <td>
                                    <a href="javascript:void(0)" data-id="{{ $empleado->id_empleado }}"
                                        onclick="editPost(event.target)" class="btn b-edit btn-info">Editar</a>
                                    <br>
                                    <br>
                                    <a href="javascript:void(0)" data-id="{{ $empleado->id_empleado }}"
                                        class="btn b-del btn-danger" onclick="deletePost(event.target)">Borrar</a>
                                </td>
                                <td>{{ $empleado->name }}</td>
                                <td>{{ $empleado->dni }}</td>
                                <td>{{ $empleado->email }}</td>
                                <td>{{ $empleado->telefono }}</td>
                                <td>{{ $empleado->direccion }}</td>
                                <td>{{ $empleado->fecha_alta }}</td>
                                @if ($empleado->tipo == 'A')
                                    <td>Administrador</td>
                                @elseif($empleado->tipo == 'O')
                                    <td>Operario</td>
                                @else
                                    <td>Invitado</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('ViewJS.empleadojs_script')
    @include('ViewJS.empleadojs_modal')

</body>

</html>
