@extends("maestra")

@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}" />
@endsection

@section('navbar')
    <a href="{{ url('tareasOp') }}" class="nav-item nav-link active"><i class="fa fa-gears"></i><span>Tareas</span></a>
@endsection

@section('contenido')
    <form id="frm-empleado" action="{{ route('tareasOp.update', $tarea, $tarea->id_tarea) }}" method="POST"
        class="form-horizontal">
        @method("PUT")
        @csrf
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="estado"> Estado: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                        {{ $tarea->estado = old('estado', $tarea->estado) }}
                        @if ($tarea->estado == 'P')
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="P" checked> Pendiente</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="R"> Realizada</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="C"> Cancelada</label>
                        @elseif($tarea->estado == 'R')
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="P"> Pendiente</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="R" checked> Realizada</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="C"> Cancelada</label>
                        @else
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="P"> Pendiente</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="R"> Realizada</label><br>
                            <label>&nbsp <INPUT TYPE="radio" name="estado" VALUE="C" checked> Cancelada</label>
                        @endif
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="ap"> Anotaciones posteriores: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <textarea type="text" cols="20" rows="4" name="ap"
                            class="form-control @error('ap') is-invalid @enderror"
                            placeholder="Anotacion posterior a la realizacion de la tarea">{{ old('ap', $tarea->anotacion_posterior) }}</textarea>
                        @error('ap')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- <div class="form-group">
                <label class="col-md-4 control-label" for="fichero"> Fichero:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group file">
                        <div>
                            <label for="image_uploads" id="labelFile">Selecciona un archivo (DOC, DOCX, PDF..)</label>
                            <input type="file" id="image_uploads" name="fichero" class="form-control"
                                value="{{ $tarea->fichero }}">
                            <input type="hidden" name="fichero2" value="{{ $fichero }}">

                        </div>
                        <div class="preview">
                            @if (isset($fichero))
                                <p id="pfile">ARCHIVO: {{ $fichero }}</p>
                            @else
                                <p id="pfile">No hay ningun archivo seleccionado</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="row mt-3 ">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <button class="btn btn-success mx-3">Guardar</button>
                    <a class="btn btn-danger mx-3" href="{{ url('tareas') }}">Cancelar</a>
                </div>
            </div>
        </fieldset>
    </form>
@endsection
