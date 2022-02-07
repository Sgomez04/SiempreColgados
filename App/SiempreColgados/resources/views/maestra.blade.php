<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SiempreColgados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    
    </script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
font-awesome/5.15.2/css/all.min.css"/>


</head>

<body>
    @include("navbar")
    <div class="container mt-2">
        <div class="row">
            <h1>@yield('titulo', 'Laravel 8 CRUD')</h1>
        </div>
        @yield('contenido', '** ERROR **. No se ha incluido sección de contenido')
    </div>
</body>

</html>
