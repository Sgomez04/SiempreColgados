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
font-awesome/5.15.2/css/all.min.css" />
    <style>
        .factura {
            table-layout: fixed;
        }

        .fact-info>div>h5 {
            font-weight: bold;
        }

        .factura>thead {
            border-top: solid 3px #000;
            border-bottom: 3px solid #000;
        }

        .factura>thead>tr>th:nth-child(2),
        .factura>tbod>tr>td:nth-child(2) {
            width: 300px;
        }

        .factura>thead>tr>th:nth-child(n+3) {
            text-align: right;
        }

        .factura>tbody>tr>td:nth-child(n+3) {
            text-align: right;
        }

        .factura>tfoot>tr>th,
        .factura>tfoot>tr>th:nth-child(n+3) {
            font-size: 24px;
            text-align: right;
        }

        .cond {
            border-top: solid 2px #000;
        }

    </style>
</head>

<body>
<div>

    <h2>Factura [Cuota {{$cuota->tipo}}</h2>

    <div class="row my-3">
      <div class="col-10">
        <h1>Direccion</h1>
        <p>Av. Santa Marta s/n</p>
        <p>21005</p>
        <p>Huelva</p>
      </div>
      <div class="col-2">
        {{-- <img src="~/images/Mil-Pasos_Negro.png" /> --}}
      </div>
    </div>
  
    <hr />
  
    <div class="row fact-info mt-3">
      <div class="col-3">
        <h5>Facturar a</h5>
        <p>
          {{-- {{$cliente->nombre}} --}}
        </p>
      </div>
      <div class="col-3">
        <h5>Enviar a</h5>
        <p>
         {{-- {{$cliente->nombre}}
         {{$cliente->correo}} --}}
        </p>
      </div>
      <div class="col-3">
        <h5>N° de factura</h5>
        <h5>Fecha de emision</h5>
        <h5>Fecha de pago</h5>
      </div>
      <div class="col-3">
        <h5>{{$cuota->id_cuota}}</h5>
        <p>{{$cuota->fecha_emision}}</p>
        <p>{{$cuota->fecha_pago}}</p>
      </div>
    </div>
  
    <div class="row my-5">
      <table class="table table-borderless factura">
        <thead>
          <tr>
            <th>Cant.</th>
            <th>Descripcion</th>
            <th>Importe</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>{{$cuota->concepto}}</td>
            <td>{{$cuota->importe}}</td>
          </tr>
        </tfoot>
      </table>
    </div>
  
    <div class="cond row">
      <div class="col-12 mt-3">
        <h4>Formas de pago</h4>
        <p>
          Transferencia Bancaria
          <br />
          {{-- IBAN: {{$cliente->cuenta_corriente}}}} --}}
        </p>
      </div>
    </div>
</div>
</body>

</html>

