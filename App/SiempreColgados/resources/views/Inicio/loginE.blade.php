@extends("maestra")

@section('links')
    <!-- Modal library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    {{-- Css --}}
    <link rel="stylesheet" href="{{ ASSETS_URL }}css/login.css" />
@endsection

@section('navbar')
    <a href="{{ url('inicio/login') }}" class="nav-item nav-link active"><i
            class="fa fa-id-card-o"></i><span>Empleado</span></a>

    <a href="{{ url('inicio/Ntarea') }}" class="nav-item nav-link"><i class="fa fa-users"></i><span>
            Cliente</span></a>
@endsection

<body>

    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <div class="avatar">
                    <img src="{{ ASSETS_URL }}img/avatar.png" alt="Avatar">
                </div>
                <h4 class="modal-title">Login Empleado</h4>
            </div>
            <br>
            <center> {!! ErrorShow('login', $error) !!}</center>
            <br>
            <div class="modal-body">
                <form action="{{ BASE_URL }}check" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="user" placeholder="Usuario" required="required"
                            value="{{ $user }}">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Contraseña"
                            required="required" value="{{ $password }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" name="submit"
                            class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>


    </div>
    <br> <br>

    {{-- MODAL --}}
    {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-confirm">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title w-100">Acceso Denegado</h4>
                </div>
                <div class="modal-body">
                    <br>
                    <p>Por favor, accede con tu cuenta de empleado</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="#" class="bton btn-danger" data-dismiss="modal">Cerrar</a>
                </div>
            </div>
        </div>
    </div> --}}

</body>

</html>
