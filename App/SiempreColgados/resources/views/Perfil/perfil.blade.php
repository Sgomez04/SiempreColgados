@extends("maestra")

@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
@endsection

@section('navbar')
    @if (Auth::user()->tipo == 'A')
        <a href="{{ url('tareas') }}" class="nav-item nav-link"><i class="fa fa-gears"></i><span>Tareas</span></a>

        <a href="{{ url('empleados') }}" class="nav-item nav-link"><i class="fa fa-id-card-o"></i><span>Empleados</span></a>

        <a href="{{ url('cuotas') }}" class="nav-item nav-link"><i class="fa fa-book"></i><span>
                Cuotas</span></a>

        <a href="{{ url('clientes') }}" class="nav-item nav-link"><i class="fa fa-users"></i><span>
                Clientes</span></a>
    @else
        <a href="{{ route('tareaClient') }}" class="nav-item nav-link"><i class="fa fa-gears"></i><span>Tareas</span></a>
    @endif
@endsection

@section('contenido')
    <div class="container">
        @include("notificacion")
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                    <img src="/img/logo2.png" alt="stack photo" class="img lgo">
                </div>
                <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                    <div class="container" style="border-bottom:1px solid black">
                        <h2>{{ $empleado->name }}</h2>
                    </div>
                    <hr>
                    <br>
                    <ul class="container details">
                        <li>
                            <p><span class="glyphicon glyphicon-send" style="width:50px;"></span>{{ $empleado->email }}
                            </p>
                        </li>
                        <li>
                            <p><span class="glyphicon glyphicon-credit-card" style="width:50px;"></span>{{ $empleado->dni }}</p>
                        </li>
                        <li>
                            <p><span class="glyphicon glyphicon-earphone"
                                    style="width:50px;"></span>{{ $empleado->telefono }}
                            </p>
                        </li>
                        <li>
                            <p><span class="glyphicon glyphicon-home"
                                    style="width:50px;"></span>{{ $empleado->direccion }}
                            </p>
                        </li>
                        <li>
                            @if ($empleado->tipo == 'A')
                                <p><span class="glyphicon glyphicon-briefcase" style="width:50px;"></span>Administrador
                                </p>
                            @elseif($empleado->tipo == 'O')
                                <p><span class="glyphicon glyphicon-briefcase" style="width:50px;"></span>Operario
                                </p>
                            @endif
                        </li>
                    </ul>
                    <br>
                    <a aria-label='Thanks' class='h-button centered bton' data-text='Editar datos'
                        href="{{ route('perfil.edit', $empleado->id_empleado) }}">
                        <span>C</span>
                        <span>l</span>
                        <span>i</span>
                        <span>c</span>
                        <span>k</span>
                        <span></span>
                        <span>A</span>
                        <span>q</span>
                        <span>u</span>
                        <span>i</span>
                    </a>
                </div>
            </div>
        </div>
    @endsection
