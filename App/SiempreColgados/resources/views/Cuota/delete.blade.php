@extends("maestra")
@section('titulo', '¿Deseas eliminar esta cuota?')
@section('contenido')

    @method("PUT")
    @csrf
    <fieldset>
        <div class="form-group">
            <p>Concepto: {{ $cuota->concepto }}</p>
        </div>

        <div class="form-group">
            <p>Fecha Emision:: {{ $cuota->fecha_emision }}</p>
        </div>

        <div class="form-group">
            <p>Importe: {{ $cuota->importe }}</p>
        </div>

        <div class="form-group">
            @if ($cuota->pagada == 'S')
            @else
                <p>Pagada: NO</p>
            @endif
        </div>

        <div class="form-group">
            <p>Fecha Pago: {{ $cuota->fecha_pago }}</p>
        </div>

        <div class="form-group">
            <p>Notas: {{ $cuota->notas }}</p>
        </div>

        <div class="form-group">
            <?php
            $cliente = '';
            foreach ($clientes as $c) {
                if ($cuota->id_cliente == $c->id_cliente) {
                    $cliente = $c;
                }
            }
            ?>
            
            <p>Cliente: {{ $cliente->nombre }}</p>
        </div>

        @include("notificacion")
        <div class="row mt-3 ">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <a class="btn btn-success mx-3" href="{{ url('cuotas') }}">Cancelar</a>
                <a class="btn btn-danger mx-3" href="{{ route('eliminarC', $cuota->id_cuota) }}">Eliminar</a>
            </div>
        </div>
    </fieldset>
@endsection
