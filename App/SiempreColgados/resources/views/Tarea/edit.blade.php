@extends("maestra")

@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}" />
@endsection

@section('navbar')
    <a href="{{ url('tareas') }}" class="nav-item nav-link active"><i class="fa fa-gears"></i><span>Tareas</span></a>

    <a href="{{ url('empleados') }}" class="nav-item nav-link"><i class="fa fa-id-card-o"></i><span>Empleados</span></a>

    <a href="{{ url('cuotas') }}" class="nav-item nav-link"><i class="fa fa-book"></i><span>
            Cuotas</span></a>

    <a href="{{ url('clientes') }}" class="nav-item nav-link"><i class="fa fa-users"></i><span>
            Clientes</span></a>
@endsection

@section('contenido')

    <form id="frm-empleado" action="{{ route('tareas.update', $tarea, $tarea->id_tarea) }}" method="POST"
        class="form-horizontal">
        @method("PUT")
        @csrf
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="cliente"> Cliente:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <select name="cliente" class="form-control selectpicker">
                            <option value="" selected>-- Selecciona un cliente --</option>
                            @foreach ($clientes as $c)
                                @if ($c->id_cliente == $tarea->id_cliente)
                                    <option value="{{ $c->id_cliente }}" selected>{{ $c->nombre }}</option>
                                @else
                                    <option value="{{ $c->id_cliente }}">{{ $c->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="telefono"> Teléfono/s contacto: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="telefono" class="form-control" value="{{ $tarea->telefono }}"
                            placeholder="Telefono del contratante" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="descripcion"> Descripción: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <textarea type="text" cols="20" rows="4" name="descripcion" class="form-control"
                            placeholder="Descripcion de la tarea"> {{ $tarea->descripcion }}</textarea>
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
                        <input type="text" name="correo" class="form-control" value="{{ $tarea->correo }}"
                            placeholder="Correo del contratante" />
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
                        <input type="text" name="direccion" class="form-control" value="{{ $tarea->direccion }}"
                            placeholder="Direccion de la tarea a realizar" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="poblacion"> Poblacion: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input type="text" name="poblacion" class="form-control" value="{{ $tarea->poblacion }}"
                            placeholder="Poblacion de la tarea a realizar" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="cp"> Codigo Postal: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-inbox"></i></span>
                        <input type="text" name="cp" class="form-control" value="{{ $tarea->cp }}"
                            placeholder="Codigo Postal de la tarea a realizar" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="estado"> Estado: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
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
                <label class="col-md-4 control-label" for="fcreacion"> Fecha de creacion de la tarea:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input type="date" name="fcreacion" class="form-control" value="{{ $tarea->fecha_crea }}"
                            placeholder="Fecha obtenida del sistema"/>
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="operario"> Operario encargado:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <select name="operario" class="form-control selectpicker">
                            <option value="" selected>-- Selecciona un operario --</option>
                            @foreach ($empleados as $e)
                                @if ($e->tipo == 'O')
                                    @if ($e->id_empleado == $tarea->operario)
                                        <option value="{{ $e->id_empleado }}" selected>{{ $e->nombre }}</option>
                                    @else
                                        <option value="{{ $e->id_empleado }}">{{ $e->nombre }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="fechaR"> Fecha de realización:</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input type="date" name="fechaR" class="form-control datepicker" value="{{ $tarea->fecha_rea }}"
                            placeholder="Fecha de realizacion de la tarea" />
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="aa"> Anotaciones anteriores: </label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <textarea type="text" cols="20" rows="4" name="aa" class="form-control"
                            placeholder="Anotacion anterior a la realizacion de la tarea">{{ $tarea->anotacion_anterior }}</textarea>
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
                        <textarea type="text" cols="20" rows="4" name="ap" class="form-control"
                            placeholder="Anotacion posterior a la realizacion de la tarea">{{ $tarea->anotacion_posterior }}</textarea>
                        @error('orden')
                            <div class="alert alert-danger">{{ $message }}</div>
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

            @include("notificacion")
            <div class="row mt-3 ">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <button class="btn btn-success mx-3">Guardar</button>
                    <a class="btn btn-danger mx-3" href="{{ url('tareas') }}">Cancelar</a>
                </div>
            </div>

            {{-- <div class="text-center bton">
                <input type="submit" class="btn btn-success" value="Guardar">
            </div> --}}
        </fieldset>
    </form>
@endsection
