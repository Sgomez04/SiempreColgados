<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SiempreColgados</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- Insert personal css --}}
    @yield('links')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}" />

</head>

<body>
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <img src="/img/logo.png" class="logoI"><span class="logoN"><b>SiempreColgados</b>
            I.C.</span>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class=" navbar-collapse justify-content-start">
            <div class="navbar-nav ml-auto">
                @auth
                    @if (Auth::user()->tipo == 'A')
                        <div class="nav-item dropdown">
                            @if (session('noti') >= 1)
                                <a href="#" data-toggle="dropdown" class="nav-item nav-link"><i
                                        class="fa fa-bell notification" title="Incidencias"><span
                                            class="badge numNotification">{{ session('noti') }}</span></i> </a>
                                <div class="dropdown-menu">
                                    @if (session('noti') == 1)
                                        <a href="{{ route('tareaslistCliente') }}" class="dropdown-item">Hay
                                            <b>{{ session('noti') }}</b>
                                            incidencia registrada<br> por clientes sin administrar</a>
                                    @else
                                        <a href="{{ route('tareaslistCliente') }}" class="dropdown-item">Hay
                                            <b>{{ session('noti') }}</b>
                                            incidencias, registradas<br> por clientes, sin administrar</a>
                                    @endif
                                </div>
                            @endif

                        </div>
                    @endif
                @endauth
                @yield('navbar')
                @auth
                    <div class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-item nav-link user-action"><img
                                src="/img/avatars/{{ session('avatar') }}.png" class="imgUser" alt="Avatar">
                            {{ Auth::user()->name }} <b class="caret"></b></a>
                        <div class="dropdown-menu">
                            <a href="{{ route('perfil.index') }}" class="dropdown-item"><i class="fa fa-sliders"></i>
                                Perfil</a>
                            <div class="divider dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method='POST' style="display:inline">
                                @csrf
                                <a href="#" class="dropdown-item" onclick="this.closest('form').submit()"><i
                                        class="material-icons">&#xE8AC;</i>
                                    Desconectar</a>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-2">
        <div class="row">
        </div>
        @yield('contenido', '** ERROR **. No se ha incluido sección de contenido')
    </div>
    <div><br></div>


    <footer class="footer-07">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <h2 class="footer-heading"><a href="#" class="logo">SiempreColgados</a></h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <script>
                            document.write(new Date().getFullYear());
                        </script> Todos los derechos reservados | Esta web esta realizada <i
                            class="ion-ios-heart" aria-hidden="true"></i> por <span>Sebas Gómez</span>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
