@extends("maestra")
@section('titulo', 'Clientes')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('clientes.create') }}" class="btn btn-success mb-2">Agregar</a>
            @include("notificacion")
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td scope="col"><b> </b></td>
                        <th scope="col">Nombre</th>
                        <th scope="col">CIF</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Cuenta Corriente</th>
                        <th scope="col">Pais</th>
                        <th scope="col">Moneda</th>
                        <th scope="col">Cuota Mensual</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $c)
                        <tr>
                            <td>
                                {{-- <a href="{{ route('clientes.edit', $c->id_cliente) }}"  class="btn btn-warning"><i class="far fa-edit">  Modificar</i></a>
                                <br>
                                <br> --}}
                                <a href="{{ url('/cuotas/userCuotas{1}') }}" class="btn btn-info mb-2"><i
                                        class="far fa-eye"> Ver Cuotas</i></a>
                                <a href="{{ route('clientes.show', $c->id_cliente) }}" class="btn btn-danger"><i
                                        class="far fa-trash-alt"> Eliminar</i></a>
                            </td>
                            <td>{{ $c->nombre }} </td>
                            <td>{{ $c->cif }} </td>
                            <td>{{ $c->telefono }}</td>
                            <td>{{ $c->correo }}</td>
                            <td>{{ $c->cuenta_corriente }}</td>
                            <?php
                            $pais = '';
                            foreach ($paises as $p) {
                                if ($c->id_pais == $p->id) {
                                    $pais = $p;
                                }
                            }
                            ?>
                            <td>{{ $pais->nombre }}</td>
                            <?php
                            $moneda = '';
                            foreach ($paises as $p) {
                                if ($c->moneda == $p->iso_moneda) {
                                    $moneda = $p->nombre_moneda;
                                }
                            }
                            ?>
                            <td>{{ $moneda }}</td>
                            <td>{{ $c->cuota_mensual }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        {{ $clientes->links()}}
    </div>
@endsection
