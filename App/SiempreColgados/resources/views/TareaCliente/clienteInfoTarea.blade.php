@extends("maestra")

@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/clienteInfoTarea.css') }}" />
@endsection

@section('navbar')
    <a href="{{ route('tareaClient') }}" class="nav-item nav-link active"><i
            class="fa fa-gears"></i><span>Tarea</span></a>
@endsection

@section('contenido')
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="material-icons">&#xe876;</i>
                </div>
                <h4 class="modal-title w-100">TAREA REGISTRADA</h4>
            </div>
            <div class="modal-body">
                <p>La tarea fue registrada y enviada correctamente. Un operario se pondra en contacto con usted pronto. Gracias.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="{{route('tareaClient')}}" class="bton btn-danger">Nueva Tarea</a>
            </div>
        </div>
    </div>
@endsection
