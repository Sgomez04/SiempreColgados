<div class="modal fade" id="post-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Datos del Empleado</h4>
            </div>
            <div class="modal-body">
                <form name="userForm" class="form-horizontal">
                    <input type="hidden" name="id_empleado" id="id_empleado">
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nombre">Nombre:</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror"
                                    placeholder="Nombre del empleado" />
                                    <span id="nombreError" class="alert-message"></span>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nombre">Contraseña:</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Contraseña del empleado" />
                                    <span id="passwordError" class="alert-message"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="dni"> DNI: </label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                <input type="text" name="dni" id="dni" class="form-control @error('dni') is-invalid @enderror"
                                    placeholder="DNI del empleado"/>
                                    <span id="dniError" class="alert-message"></span>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="correo"> Correo electrónico: </label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="text" name="correo" id="correo" class="form-control @error('correo') is-invalid @enderror"
                                    placeholder="Correo del empleado"/>
                                    <span id="correoError" class="alert-message"></span>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="telefono"> Telefono: </label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                                <input type="text" name="telefono" id="telefono" class="form-control @error('telefono') is-invalid @enderror"
                                    placeholder="Telefono del empleado"/>
                                    <span id="telefonoError" class="alert-message"></span>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="direccion"> Direccion: </label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input type="text" name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror"
                                    placeholder="Direccion del empleado"/>
                                    <span id="direccionError" class="alert-message"></span>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fechalta"> Fecha de alta del empleado:</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input type="date" name="fechalta" id="fechalta" class="form-control"
                                    value="{{ (new DateTime('now'))->format('Y-m-d') }}" placeholder="Fecha obtenida del sistema"
                                    readonly />
                                    <span id="fechaltaError" class="alert-message"></span>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="cargo"> Cargo del empleado: </label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                                <label>&nbsp <INPUT TYPE="radio" name="cargo" id="cargo" VALUE="A"> Administrador</label><br>
                                <label>&nbsp <INPUT TYPE="radio" name="cargo" id="cargo" VALUE="O" checked> Operario</label><br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn b-save btn-primary" onclick="createPost()">Guardar</button>
            </div>
        </div>
    </div>
</div>
