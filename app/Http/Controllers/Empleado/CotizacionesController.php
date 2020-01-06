<?php

namespace App\Http\Controllers\Empleado;

use Illuminate\Http\Request;
use App\Cotizacion;
use App\Http\Controllers\Controller;
use App\Services\Cotizacion\DownloadCotizacionService;

class CotizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function prueba()
    {
        return 'hola mundo';
    }

    public function index()
    {
        $cotizaciones = Cotizacion::get();
        return view('empleado.cotizaciones.index', ['cotizaciones' => $cotizaciones,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $cotizacion = new Cotizacion;
        $numero = Cotizacion::orderBy('created_at', 'desc')->pluck('id')->first();
        return view('empleado.cotizaciones.create', ['cotizacion' => $cotizacion, 'numero' => $numero, 'edit' => $edit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $Cotizacion = Cotizacion::create($request->all());
        //     Alert::success('Cotizacion Creada', 'Siga agregando información');
        // return 'Empleado Creado';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(/*$id*/)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download(Cotizacion $cotizacion)
    {
        $downloadCotizacionService = new DownloadCotizacionService($cotizacion);
        return $downloadCotizacionService->download();
    }

    public function buscarCotizaciones(Request $request)
    {
        //dd($request);
        $query = $request->input('query');
        //dd($query);
        $wordsquery = explode(' ', $query);
        $cotizaciones = Cotizacion::where(function ($q) use ($wordsquery) {
            foreach ($wordsquery as $word) {
                $q->orWhere('nombre', 'LIKE', "%$word%")
                    ->orWhere('responsable', 'LIKE', "%$word%")
                    ->orWhere('id', 'LIKE', "%$word%")
                    ->orWhere('telefono', 'LIKE', "%$word%")
                    ->orWhere('correo', 'LIKE', "%$word%");
            }
        })->sortable()->paginate(10); //->whereMonth('created_at', date("m"))->sortable()->paginate(10);  
        $cotizaciones->withPath('producto?query=' . $query);
        return view('empleado.cotizaciones.index', ['cotizaciones' => $cotizaciones]);
    }
}
