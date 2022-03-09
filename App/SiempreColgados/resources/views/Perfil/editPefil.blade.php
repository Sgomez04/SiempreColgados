@extends("maestra")

@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}" />
@endsection

@section('navbar')
    @if (Auth::user()->tipo == 'A')
        <a href="{{ url('tareas') }}" class="nav-item nav-link"><i class="fa fa-gears"></i><span>Tareas</span></a>

        <a href="{{ url('empleados') }}" class="nav-item nav-link"><i class="fa fa-id-card-o"></i><span>Empleados</span></a>

        <a href="{{ url('empleadosjs') }}" class="nav-item nav-link"><i class="fa fa-id-card-o"></i><span>EmpleadosJS</span></a>
        
        <a href="{{ url('cuotas') }}" class="nav-item nav-link"><i class="fa fa-book"></i><span>
                Cuotas</span></a>

        <a href="{{ url('clientes') }}" class="nav-item nav-link"><i class="fa fa-users"></i><span>
                Clientes</span></a>
    @else
        <a href="{{ route('tareaClient') }}" class="nav-item nav-link"><i class="fa fa-gears"></i><span>Tareas</span></a>
    @endif
@endsection

@section('contenido')
    <form id="frm-tarea" action="{{ route('perfil.update', $empleado) }}" method="POST" class="form-horizontal">
        @method("PUT")
        @csrf
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="nombre">Nombre:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                            value="{{ old('nombre', $empleado->name) }}" placeholder="Nombre del empleado" />
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- <div class="form-group">
                <label class="col-md-4 control-label" for="password"> Contraseña: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            value="{{ old('password', bcrypt($empleado->password)) }}" placeholder="Contraseña del empleado" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div> --}}

            <div class="form-group">
                <label class="col-md-4 control-label" for="dni"> DNI: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                        <input type="text" name="dni" class="form-control @error('dni') is-invalid @enderror"
                            value="{{ old('dni', $empleado->dni) }}" placeholder="DNI del empleado" />
                        @error('dni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="correo"> Correo electrónico: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="text" name="correo" class="form-control @error('correo') is-invalid @enderror"
                            value="{{ old('correo', $empleado->email) }}" readonly placeholder="Correo del empleado" />
                        @error('correo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="telefono"> Telefono: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                        <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror"
                            value="{{ old('telefono', $empleado->telefono) }}" placeholder="Telefono del empleado" />
                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="direccion"> Direccion: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror"
                            value="{{ old('direccion', $empleado->direccion) }}" placeholder="Direccion del empleado" />
                        @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mt-3 ">
                <div class="text-center bton">
                    <button class="btn btn-success mx-3">Guardar</button>
                    <a class="btn btn-danger mx-3" href="{{ url('empleados') }}">Cancelar</a>
                </div>
            </div>
        </fieldset>
    </form>
@endsection
