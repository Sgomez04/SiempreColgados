@extends("maestra")

@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}" />
@endsection

@section('navbar')
    <a href="{{ route('tareaClient') }}" class="nav-item nav-link active"><i
            class="fa fa-gears"></i><span>Tarea</span></a>
@endsection

@section('contenido')
    <form id="frm-tarea" action="{{ route('tareaClientCreate') }}" method="POST" class="form-horizontal">
        @csrf
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="cif"> CIF del Cliente:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
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
                <label class="col-md-4 control-label" for="telefono"> Teléfono/s contacto: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                        <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror"
                            placeholder="Telefono del contratante" value="{{ old('telefono') }}" />
                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="descripcion"> Descripción: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <textarea type="text" cols="20" rows="4" name="descripcion"
                            class="form-control @error('descripcion') is-invalid @enderror"
                            placeholder="Descripcion de la tarea">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
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
                            placeholder="Correo del contratante" value="{{ old('correo') }}" />
                        @error('correo')
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
                            value="{{ old('direccion') }}" placeholder="Direccion de la tarea a realizar" />
                        @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="poblacion"> Poblacion: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input type="text" name="poblacion" class="form-control @error('poblacion') is-invalid @enderror"
                            value="{{ old('poblacion') }}" placeholder="Poblacion de la tarea a realizar" />
                        @error('poblacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="cp"> Codigo Postal: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-inbox"></i></span>
                        <input type="text" name="cp" class="form-control @error('cp') is-invalid @enderror"
                            value="{{ old('pc') }}" placeholder="Codigo Postal de la tarea a realizar" />
                        @error('cp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="fechaR"> Fecha de realización:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input type="date" name="fechaR"
                            class="form-control datepicker @error('fechaR') is-invalid @enderror"
                            value="{{ old('fechaR') }}" placeholder="Fecha de realizacion de la tarea" />
                        @error('fechaR')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="aa"> Anotaciones anteriores: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <textarea type="text" cols="20" rows="4" name="aa"
                            class="form-control @error('aa') is-invalid @enderror"
                            placeholder="Anotacion anterior a la realizacion de la tarea">{{ old('aa') }}</textarea>
                        @error('aa')
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
                </div>
            </div>
        </fieldset>
    </form>
@endsection
