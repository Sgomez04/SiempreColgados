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
    <a href="{{url('/login')}}" class="nav-item nav-link active"><i class="fa fa-id-card-o"></i><span>Empleado</span></a>
@endsection

@section('contenido')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="avatar">
                            <img src="{{ asset('img/avatar.png') }}" alt="Avatar">
                        </div>
                        <h4 class="modal-title">Reestablecer contraseña</h4>
                    </div>
                    <br>
                    <br>
                    <div class="modal-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="col-form-label">{{ __('Correo electronico') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                    placeholder="Introduce tu correo registrado en la empresa">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>


                            <div class="row mb-0">
                                <div class="form-group">
                                    <button type="submit" name="submit"
                                        class="btn btn-primary btn-lg btn-block login-btn">Enviar email</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
