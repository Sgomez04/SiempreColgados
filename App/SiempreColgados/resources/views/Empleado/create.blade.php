@extends("maestra")
@section('titulo', 'Registrar Empleado')
@section('contenido')

    <form id="frm-tarea" action="{{ route('empleados.store') }}" method="POST" class="form-horizontal">
        @csrf
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="nombre">Nombre:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre del empleado" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="password"> Contraseña: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="password" class="form-control" placeholder="Contraseña del empleado" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="dni"> DNI: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="dni" class="form-control" placeholder="DNI del empleado" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="correo"> Correo electrónico: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="text" name="correo" class="form-control" placeholder="Correo del empleado" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="telefono"> Telefono: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input type="text" name="telefono" class="form-control" placeholder="Telefono del empleado" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="direccion"> Direccion: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input type="text" name="direccion" class="form-control" placeholder="Direccion del empleado" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="fechalta"> Fecha de alta del empleado:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input type="text" name="fechalta" class="form-control"
                            value="{{ (new DateTime('now'))->format('Y-m-d') }}" placeholder="Fecha obtenida del sistema"
                            readonly />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="cargo"> Cargo del empleado: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                        <label>&nbsp <INPUT TYPE="radio" name="cargo" VALUE="A"> Administrador</label><br>
                        <label>&nbsp <INPUT TYPE="radio" name="cargo" VALUE="O" checked> Operario</label><br>
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            @include("notificacion")
            <div class="row mt-3 ">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <button class="btn btn-success mx-3">Guardar</button>
                    <a class="btn btn-danger mx-3" href="{{ url('empleados') }}">Cancelar</a>
                </div>
            </div>

            {{-- <div class="text-center bton">
                <input type="submit" class="btn btn-success" value="Guardar">
            </div> --}}
        </fieldset>
    </form>
@endsection
