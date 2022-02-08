@extends("maestra")
@section('titulo', '¿Desea eliminar este cliente?')
@section('contenido')

    @method("PUT")
    @csrf
    <fieldset>
        <div class="form-group">
            <label class="col-md-4 control-label" for="nombre">Nombre:</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}"
                        placeholder="Nombre del cliente" readonly />
                    @error('orden')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="cif"> CIF: </label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" name="cif" class="form-control" value="{{ $cliente->cif }}" placeholder=" CIF
                                        del cliente" readonly />
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
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" name="telefono" class="form-control" value="{{ $cliente->telefono }}"
                        placeholder=" Telefono del cliente" readonly />
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
                    <input type="text" name="correo" class="form-control" value="{{ $cliente->correo }}"
                        placeholder=" Correo del empleado" readonly />
                    @error('orden')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="cuenta"> Cuenta Corriente: </label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input type="text" name="cuenta" class="form-control" value="{{ $cliente->cuenta_corriente }}"
                        placeholder=" Cuenta corriente del cliente" readonly />
                    @error('orden')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="pais"> Pais:</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <?php
                    $pais = '';
                    foreach ($paises as $p) {
                        if ($cliente->id_pais == $p->id) {
                            $pais = $p;
                        }
                    }
                    ?>
                    <input type="text" name="pais" class="form-control" value="{{ $pais->nombre }}" readonly/>
                    @error('orden')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="moneda"> Moneda:</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" name="moneda" class="form-control" value="{{ $pais->nombre_moneda }}" readonly/>
                    @error('orden')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="importe"> Importe Cuota Mensual: </label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input type="text" name="importe" class="form-control" value="{{ $cliente->mensual }}"
                        placeholder=" Importe a pagar mensualmente" readonly />
                    @error('orden')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        @include("notificacion")
        <div class="row mt-3 ">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <a class="btn btn-success mx-3" href="{{ route('clientes.destroy', $cliente->id_cliente) }}">Eliminar</a>
                <a class="btn btn-danger mx-3" href="{{ url('clientes') }}">Cancelar</a>
            </div>
        </div>


        {{-- <div class="text-center bton">
                <input type="submit" class="btn btn-success" value="Guardar">
            </div> --}}
    </fieldset>
@endsection
