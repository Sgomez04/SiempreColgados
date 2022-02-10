<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
    <img src="" class="logoI"><span class="logoN"><b>NoSeCaeN</b>
        S.L.</span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class=" navbar-collapse justify-content-start">
        <div class="navbar-nav ml-auto">

            <a href="{{ url('tareas') }}" class="nav-item nav-link active"><i
                    class="fa fa-gears"></i><span>Tareas</span></a>

            <a href="{{ url('empleados') }}" class="nav-item nav-link"><i
                    class="fa fa-users"></i><span>Empleados</span></a>

            <a href="{{ url('cuotas') }}" class="nav-item nav-link"><i class="fa fa-user"></i><span>
                    Cuotas</span></a>

            <a href="{{ url('clientes') }}" class="nav-item nav-link"><i class="fa fa-user"></i><span>
                    Clientes</span></a>
        </div>
    </div>
</nav>
