@extends("maestra")
@section('titulo', 'Cuotas')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('cuotas.create') }}" class="btn btn-success mb-2">Agregar</a>
            @include("notificacion")
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td scope="col"><b> # </b></td>
                        <th scope="col">Concepto</th>
                        <th scope="col">Fecha Emision</th>
                        <th scope="col">Importe</th>
                        <th scope="col">Pagada</th>
                        <th scope="col">Fecha Pago</th>
                        <th scope="col">Notas</th>
                        <th scope="col">Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cuotas as $c)
                        <tr>
                            <td>
                                <a href="{{ route('cuotas.edit', [$c->id]) }}" class="edit"><i class="material-icons"
                                        title="Editar Cuota">&#xE254;</i></a>
                                <br>
                                <br>
                                {{-- <a href="{{ route('cuotas.delete', [$c->id]) }}" class="delete"><i class="material-icons"
                                        title="Eliminar Cuota">&#xE872;</i></a> --}}
                            </td>
                            <td>{{ $c->concepto }} </td>
                            <td>{{ $c->fecha_emision}} </td>
                            <td>{{ $c->importe}}</td>
                            <td>{{ $c->pagada}}</td>
                            <td>{{ $c->fechapago}}</td>
                            <td><textarea cols="20" rows="5" readonly>{{ $c->notas}}</textarea></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
