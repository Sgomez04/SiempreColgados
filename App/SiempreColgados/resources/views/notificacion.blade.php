<?php /* Basado en https://www.nicesnippets.com/blog/how-to-make-flash-message-laravel-8 */
?>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        {!! $message !!}
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        {!! $message !!}
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        {!! $message !!}
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        {!! $message !!}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger mt-4">
        Revise los errores en los campos
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
