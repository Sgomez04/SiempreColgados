@extends("maestra")

@section('links')
    <!-- Modal library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    {{-- Css --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('navbar')
    <a href="{{ url('/') }}" class="nav-item nav-link"><i class="fa fa-id-card-o"></i><span>Inicio</span></a>

    <a href="{{ route('indexE') }}" class="nav-item nav-link"><i class="fa fa-id-card-o"></i><span>Empleado</span></a>

    <a href="{{ route('indexC') }}" class="nav-item nav-link active"><i class="fa fa-users"></i><span>
            Cliente</span></a>
@endsection

@section('contenido')
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <div class="avatar">
                    <img src="{{ asset('img/avatar.png') }}" alt="Avatar">
                </div>
                <h4 class="modal-title">Login Cliente</h4>
            </div>
            <br>
            {{-- <center> {!! ErrorShow('login', $error) !!}</center> --}}
            <br>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="correo" placeholder="Correo Electronico"
                            required="required" value="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Contraseña"
                            required="required" value="">
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
@endsection
