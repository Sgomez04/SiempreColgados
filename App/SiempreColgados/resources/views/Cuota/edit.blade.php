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

    <a href="{{ url('cuotas') }}" class="nav-item nav-link active"><i class="fa fa-book"></i><span>
            Cuotas</span></a>

    <a href="{{ url('clientes') }}" class="nav-item nav-link"><i class="fa fa-users"></i><span>
            Clientes</span></a>
@endsection

@section('contenido')
    <form id="frm-tarea" action="{{ route('cuotas.update', $cuota) }}" method="POST" class="form-horizontal">
        @method("PUT")
        @csrf
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="concepto">Concepto:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-paperclip"></i></span>
                        <input type="text" name="concepto" class="form-control @error('concepto') is-invalid @enderror"
                            value="{{ old('concepto', $cuota->concepto) }}" placeholder="Concepto de la cuota" />
                        @error('concepto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="fechaemision"> Fecha Emision: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input type="date" name="fechaemision"
                            class="form-control @error('fechaemision') is-invalid @enderror"
                            value="{{ old('fechaemision', $cuota->fecha_emision) }}"
                            placeholder="Fecha de emision de la cuota" />
                        @error('fechaemision')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="importe"> Importe: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        <input type="text" name="importe" class="form-control @error('importe') is-invalid @enderror"
                            value="{{ old('importe', $cuota->importe) }}" placeholder="Importe de la cuota" />
                        @error('importe')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="pagada"> Pagada: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                        @if (old('pagada', $cuota->pagada) == 'S')
                            <label>&nbsp <INPUT TYPE="radio" name="pagada" VALUE="S" checked>Pagada</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="pagada" VALUE="N">No pagada</label>
                        @else
                            <label>&nbsp <INPUT TYPE="radio" name="pagada" VALUE="S">Pagada</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="pagada" VALUE="N" checked>No pagada</label>
                        @endif
                        @error('pagada')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="fechapago"> Fecha Pago: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input type="date" name="fechapago" class="form-control @error('fechapago') is-invalid @enderror"
                            value="{{ old('fechapago', $cuota->fecha_pago) }}" placeholder="Fecha de pago de la cuota" />
                        @error('fechapago')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="notas"> Notas: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <textarea type="text" cols="20" rows="4" name="notas"
                            class="form-control @error('notas') is-invalid @enderror"
                            placeholder="Notas sobre la cuota">{{ old('notas', $cuota->notas) }}</textarea>
                        @error('notas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="cliente"> Cliente:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <select name="cliente" class="form-control selectpicker @error('cliente') is-invalid @enderror">
                            <option value="" selected>-- Selecciona un cliente --</option>
                            @foreach ($clientes as $cliente)
                                @if ($cuota->id_cliente == $cliente->id_cliente)
                                    <option value="{{ $cliente->id_cliente }}" selected>{{ $cliente->nombre }}
                                    </option>
                                @else
                                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('cliente')
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
                    <a class="btn btn-danger mx-3" href="{{ url('cuotas') }}">Cancelar</a>
                </div>
            </div>

        </fieldset>
    </form>
@endsection
