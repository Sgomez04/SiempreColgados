<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Cuota;
use App\Models\Cliente;
use App\Http\Requests\CuotaValidate;
use Barryvdh\DomPDF\Facade as PDF;
// use App\Mail\SendEmails;
use App\Models\CambioDivisa;
use Illuminate\Support\Facades\Mail;



class CuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginas['total'] = Cuota::all()->count();
        $paginas['mostrar'] = env('PAGINATE', 4);
        return view("Cuota.list", [
            "cuotas" => Cuota::Paginate($paginas['mostrar']),
            "paginas" => $paginas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("Cuota.create_mensual", [
            "clientes" => Cliente::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createE()
    {
        return view("Cuota.create_excep", [
            "clientes" => Cliente::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CuotaValidate $request)
    {
        $clientes = Cliente::all();
        Cuota::createM($request, $clientes);

        //Envio de correos a todos los clientes por creacion de cuota mensual
        foreach ($clientes as $datos) {
            $cliente = Cliente::find($datos->id_cliente);
            $importe['subtotal'] = CambioDivisa::toEuros($datos->cuota_mensual, strtolower($datos->moneda));
            $importe['total'] = round($importe['subtotal'] * 0.21, 2);
            $cuota = $request;

            $data['cliente'] = $cliente->name;
            $data['cuota'] = $cuota->tipo;

            $pdf = PDF::loadView('Cuota.invoice', compact('cuota', 'cliente', '$importe'));
            Mail::send('Mail.mail', $data,  function ($message) use ($pdf) {
                $message->from('siemprecolgados.company@gmail.com')
                    ->to('sgomez_m@hotmail.com')
                    ->subject('Cuota Mensual')
                    ->attachData($pdf->output(), "SiempreColgados.pdf");
            });
        }
        return redirect()->route("cuotas.index")->with([
            "success" => "Las cuotas mensuales fueron creadas correctamente",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeE(CuotaValidate $request)
    {
        $cliente = Cliente::find($request->cliente);
        Cuota::createE($request, Cliente::all());

        $importe['subtotal'] = CambioDivisa::toEuros($request->importe, strtolower($cliente->moneda));
        $importe['total'] = round($importe['subtotal'] * 0.21, 2);
        $cuota = $request;
        $data['cuota'] = $cuota->tipo;

        $pdf = PDF::loadView('Cuota.invoice', compact('cuota', 'cliente','importe'));
        Mail::send('Mail.mail', $data, function ($message) use ($pdf) {
            $message->from('siemprecolgados.company@gmail.com')
                ->to('sgomez_m@hotmail.com')
                ->subject('Cuota Mensual')
                ->attachData($pdf->output(), "SiempreColgados.pdf");
        });

        return redirect()->route("cuotas.index")->with([
            "success" => "Las cuota expecepcional fue creada correctamente",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuota = Cuota::find($id);
        $clientes = Cliente::all();
        return view("Cuota.delete", compact('cuota', 'clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuota = Cuota::find($id);
        $clientes = Cliente::all();
        return view("Cuota.edit", compact('cuota', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CuotaValidate $request, $id)
    {
        Cuota::updateC($request, $id);
        return redirect()->route("cuotas.index")
            ->with(["success" => "Los datos de la cuota han sido actualizados"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cuota::destroyC($id);
        return redirect()->route("cuotas.index")->with([
            "warning" => "La cuota fue eliminada correctamente",
        ]);
    }

    public function printInvoice($id_cuota)
    {
        $cuota = Cuota::find($id_cuota);
        $cliente = Cliente::find($cuota->id_cliente);
        $importe['subtotal'] = CambioDivisa::toEuros($cuota->importe, strtolower($cliente->moneda));
        $importe['total'] = round($importe['subtotal'] * 0.21, 2);

        $pdf = PDF::loadView('Cuota.invoice', compact('cuota', 'cliente','importe'));
        return $pdf->stream('Factura_cuota.pdf');
    }
}
