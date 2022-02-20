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
    <a href="" class="nav-item nav-link active"><i class="fa fa-id-card-o"></i><span>Empleado</span></a>
@endsection

@section('contenido')
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <div class="avatar">
                    <img src="{{ asset('img/avatar.png') }}" alt="Avatar">
                </div>
                <h4 class="modal-title">Nueva Contraseña</h4>
            </div>
            <br>
            <br>
            <div class="modal-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" readonly>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password" placeholder="Nueva contraseña" autofocus>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Repite la contraseña">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>

            <div class="row mb-0">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-btn">Reestablecer
                        contraseña</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
