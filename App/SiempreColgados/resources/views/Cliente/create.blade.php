@extends("maestra")

@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}" />
@endsection

@section('navbar')
    <a href="{{ url('tareas') }}" class="nav-item nav-link"><i class="fa fa-gears"></i><span>Tareas</span></a>

    <a href="{{ url('empleados') }}" class="nav-item nav-link"><i class="fa fa-id-card-o"></i><span>Empleados</span></a>

    <a href="{{ url('cuotas') }}" class="nav-item nav-link"><i class="fa fa-book"></i><span>
            Cuotas</span></a>

    <a href="{{ url('clientes') }}" class="nav-item nav-link active"><i class="fa fa-users"></i><span>
            Clientes</span></a>
@endsection

@section('contenido')
    <form id="frm-tarea" action="{{ route('clientes.store') }}" method="POST" class="form-horizontal">
        @csrf
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="nombre">Nombre:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="Nombre del cliente" value="{{ old('nombre') }}" />
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="cif"> CIF: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <input type="text" name="cif" class="form-control @error('cif') is-invalid @enderror"
                            placeholder="CIF del cliente" value="{{ old('cif') }}" />
                        @error('cif')
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
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror"
                            placeholder="Telefono del cliente" value="{{ old('telefono') }}" />
                        @error('telefono')
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
                            placeholder="Correo del empleado" value="{{ old('correo') }}" />
                        @error('correo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="cuenta"> Cuenta Corriente: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                        <input type="text" name="cuenta" class="form-control @error('orden') is-invalid @enderror"
                            placeholder="Cuenta corriente del cliente" value="{{ old('cuenta') }}" />
                        @error('cuenta')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="pais"> Pais:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                        <select name="pais" class="form-control selectpicker @error('pais') is-invalid @enderror">
                            <option value="" selected>-- Selecciona un pais --</option>
                            @foreach ($paises as $p)
                                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                            @endforeach
                        </select>
                        @error('pais')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="moneda"> Moneda:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
                        <select name="moneda" class="form-control selectpicker @error('moneda') is-invalid @enderror">
                            <option value="" selected>-- Selecciona una moneda --</option>
                            @foreach ($paises as $p)
                                @if ($p->iso_moneda != null)
                                    <option value="{{ $p->iso_moneda }}">{{ $p->nombre_moneda }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('moneda')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="importe"> Importe Cuota Mensual: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        <input type="text" name="importe" class="form-control @error('importe') is-invalid @enderror"
                            placeholder="Importe a pagar mensualmente" value="{{ old('importe') }}" />
                        @error('importe')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mt-3 ">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <button class="btn btn-success mx-3">Guardar</button>
                    <a class="btn btn-danger mx-3" href="{{ url('clientes') }}">Cancelar</a>
                </div>
            </div>
        </fieldset>
    </form>
@endsection
