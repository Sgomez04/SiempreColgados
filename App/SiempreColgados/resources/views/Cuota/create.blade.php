@extends("maestra")
@section('titulo', 'Registrar Cuota')
@section('contenido')

    <form id="frm-tarea" action="{{ route('cuotas.store') }}" method="POST" class="form-horizontal">
        @csrf
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="concepto">Concepto:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="concepto" class="form-control" placeholder="Concepto de la cuota" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="fechaemision"> Fecha Emision: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="fechaemision" class="form-control"
                            placeholder="Fecha de emision de la cuota" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="importe"> Importe: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="importe" class="form-control" placeholder="Importe de la cuota" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="pagada"> Pagada: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                        <label>&nbsp <INPUT TYPE="radio" name="pagada" VALUE="S">Pagada</label><br>
                        <label>&nbsp <INPUT TYPE="radio" name="pagada" VALUE="N" checked>No pagada</label><br>
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="fechapago"> Fecha Pago: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input type="text" name="fechapago" class="form-control" placeholder="Fecha de pago de la cuota" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="notas"> Notas: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <textarea type="text" cols="20" rows="4" name="notas" class="form-control"
                        placeholder="Notas sobre la cuota"></textarea>
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="cliente"> Cliente:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <select name="cliente" class="form-control selectpicker">
                            <option value="" selected></option>
                            @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
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
                    <a class="btn btn-danger mx-3" href="{{ url('cuotas') }}">Cancelar</a>
                </div>
            </div>

            {{-- <div class="text-center bton">
                <input type="submit" class="btn btn-success" value="Guardar">
            </div> --}}
        </fieldset>
    </form>
@endsection
