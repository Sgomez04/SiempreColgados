<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;
use App\Models\Cliente;
use Barryvdh\DomPDF\PDF;


class InvoiceController extends Controller
{
    public function printInvoice()
    {
        // $cuota = Cuota::find($id_cuota);
        // $cliente = Cuota::find($id_cliente);
        // $tarea = Cuota::find($id);

        // $pdf = PDF::loadView('invoice', compact('cuota'));
        $pdf = PDF::loadView('invoice');
        return $pdf->download('Factura_cuota.pdf');
    }
}
