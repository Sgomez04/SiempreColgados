<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Cuota {{ $cuota->tipo }} - SiempreColgados</title>

    <style>
        .invoice-title {
            text-align: center;
            padding-bottom: 30px;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="invoice-box">
        <h2 class="invoice-title">Cuota {{ $cuota->tipo }} - SiempreColgados</h3>
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="https://i.pinimg.com/564x/db/67/d4/db67d49cf938ffcd7e24dd362d2162a9.jpg"
                                        style="width: 100%; max-width: 150px" />
                                </td>

                                <td>
                                    Factura #: {{ $cuota->tipo }}<br />
                                    Emitida: {{ date('d-m-Y') }}<br />
                                    Cobrada : {{ date('d-m-Y') }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    SiempreColgados<br />
                                    av. Santa Marta, s/n<br />
                                    Huelva, 21005 - España
                                </td>

                                <td>
                                    {{ $cliente->cif }}<br />
                                    {{ $cliente->nombre }}<br />
                                    {{ $cliente->correo }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="heading">
                    <td>Concepto</td>

                    <td>Importe</td>
                </tr>

                <tr class="item last">
                    <td>{{ $cuota->concepto }} </td>

                    <td>{{ $importe['subtotal'] }}</td>
                </tr>
                <tr></tr>
                <tr>
                    <td></td>
                    <td>IVA : 21%</td>
                </tr>
                <tr class="total">
                    <td></td>
                    <td>Total: {{ $importe['total'] }} {{ $cliente->moneda }}</td>

                </tr>
            </table>
    </div>
</body>

</html>
