@extends("maestra")
@section('titulo', '¿Desea eliminar este cliente?')
@section('contenido')

    @method("PUT")
    @csrf
    <fieldset>
        <div class="form-group">
            <p>Nombre: {{ $cliente->nombre }}</p>
        </div>

        <div class="form-group">
            <p>CIF: {{ $cliente->cif }}</p>
        </div>

        <div class="form-group">
            <p>Telefono: {{ $cliente->telefono }}</p>
        </div>

        <div class="form-group">
            <p>Correo electrónico: {{ $cliente->correo }}</p>
        </div>

        <div class="form-group">
            <p>Cuenta Corriente:: {{ $cliente->cuenta_corriente }}</p>
        </div>

        <div class="form-group">
            @foreach ($paises as $p)
                @if ($p->id == $cliente->id_pais)
                    <p>Pais: {{ $p->nombre }}</p>
                @endif
            @endforeach
        </div>

        <div class="form-group">
            @foreach ($paises as $p)
                @if ($p->iso_moneda == $cliente->moneda)
                    <p>Moneda: {{ $p->nombre_moneda }}</p>
                @endif
            @endforeach
        </div>

        <div class="form-group">
            <p>Importe Cuota Mensual: {{ $cliente->mensual }}</p>
        </div>

        @include("notificacion")
        <div class="row mt-3 ">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <a class="btn btn-success mx-3" href="{{ url('clientes') }}">Cancelar</a>
                <a class="btn btn-danger mx-3" href="{{ route('clientes.destroy', $cliente->id_cliente) }}">Eliminar</a>
            </div>
        </div>
    </fieldset>
@endsection
