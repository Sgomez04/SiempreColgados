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
                <h4 class="modal-title">Login Empleado</h4>
            </div>
            <br>
            <br>
            <div class="modal-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" name="email" placeholder="Correo Electronico" required
                            autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password" placeholder="Contraseña" required="required">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <button type="submit" name="submit"
                            class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <div class="or-container">
                        <div class="line-separator"></div>
                        <div class="or-label">o</div>
                        <div class="line-separator"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline"
                                href="{{route('loginredirect', 'google')}}"><img
                                    src="https://img.icons8.com/color/16/000000/google-logo.png">  Login con
                                Google</a>
                            <br>
                            <a class="btn btn-lg btn-facebook btn-block text-uppercase btn-outline"
                                href="{{route('loginredirect', 'facebook')}}"><i class="fa fa-facebook fa-fw" style="border 2px solid"></i> Login con
                                Facebook</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <br> <br>
            </div>
        </div>
    </div>
@endsection
