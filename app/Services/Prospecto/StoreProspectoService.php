<?php

namespace App\Services\Prospecto;

use App\Cotizacion;
use App\CotizacionEscala;
use App\CotizacionFcl;
use App\CotizacionFtl;
use App\Mail\NewProspectoMail;
use App\Mercancia;
use App\Prospecto;
use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StoreProspectoService
{

    protected $prospecto;
    protected $cotizacion;
    protected $cotizacionFtl;
    protected $cotizacionFcl;
    protected $cotizacionesEscalas = [];
    protected $mercancias = [];

    public function __construct(Request $request)
    {

        // dd($request->input());

        $this->crearProspecto($request);
        $this->crearCotizacion($request);
        $this->crearCotizacionFTLSiAplica($request);
        $this->crearCotizacionFCLSiAplica($request);
        $this->crearMercancias($request);
        $this->crearCotizacionEscala($request);
        $this->enviarMensaje($request);
    }

    /**
     * ========
     * CREATORS
     * ========
     */

    protected function crearProspecto($request)
    {
        $this->prospecto = Prospecto::create([
            'razon_social' => $request->razon_social,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'correo' => $request->correo
        ]);
    }

    protected function crearCotizacion($request)
    {
        $this->cotizacion = Cotizacion::create([
            'responsable' => $request->responsable,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'line1_origen' => $request->linea1_origen,
            'cp_origen' => $request->cp_origen,
            'line1_destino' => $request->linea1_destino,
            'cp_destino' => $request->cp_destino,
            'tipo_servicio' => $request->tipo_servicio,
            'eta' => $request->eta,
            'peso_total_cot' => $request->peso_total_cot,
            'volumen_total_cot' => $request->volumen_total_cot,
            'es_estibable' => $request->es_estibable,
            'tipo_despacho' => $this->getTipoDespacho($request),
            'custodia_desde' => $request->custodia_desde,
            'custodia_hasta' => $request->custodia_hasta,
            'observaciones' => $request->observaciones_servicio,
            'prospecto_id' => $this->prospecto->id,
            'despacho_aduanal' => $request->despacho_aduanal ? true : false,
        ]);
    }

    public function crearMercancias($request)
    {
        foreach ($request->nombre as $key => $nombre) {
            $mercancia = Mercancia::create([

                'nombre' => $nombre,
                'naturaleza' => $request->naturaleza[$key],
                'alto' => $request->alto[$key],
                'ancho' => $request->ancho[$key],
                'profundo' => $request->profundo[$key],
                'medidas' => $request->medidas[$key],
                'peso_br' => $request->peso_br[$key],
                'medida_peso' => $request->medida_peso[$key],
                'bultos' => $request->bultos[$key],
                'peso_total' => $request->peso_total[$key],
                'volumen_total' => $request->volumen_total[$key],
                'observaciones' => $request->observaciones[$key],
                'cotizacion_id' => $this->cotizacion->id,
            ]);

            if (isset($request->servicio)) {
                for ($i = 0; $i < count($request->servicios[$key]); $i++) {
                    $aux = Servicio::find($request->servicios[$key][$i]);
                    $mercancia->servicios()->attach($aux, ['comentario' => $request->comentario_serv[$key][$i]]);
                }
            }
            $mercancia->save();
            $this->mercancias[] = $mercancia;
        }
    }

    public function crearCotizacionFTLSiAplica($request)
    {
        if ($request->tipo_servicio == 'Terrestre FTL') {
            $this->cotizacionFtl = CotizacionFtl::create([
                'cotizacion_id' => $this->cotizacion->id,
                'tipo_unidad' => $request->tipo_unidad,
                'unidad' => $request->unidad,
                'es_sobredimensionado' => $request->es_sobredimensionado,
                'capacidad_refrigerante' => $request->capacidad_refrigerante,
                'temperatura' => $request->temperatura,
            ]);
        }
    }

    public function crearCotizacionFCLSiAplica($request)
    {
        if ($request->tipo_servicio == 'Maritimo FCL') {

            CotizacionFcl::create([
                'cotizacion_id' => $this->cotizacion->id,
                'contenedor_maritimo' => $request->contenedor_maritimo,
            ]);
        }
    }

    public function crearCotizacionEscala($request)
    {

        if(!$request->direccion_escala){
            return;
        }

        foreach ($request->direccion_escala as $key => $direccion) {
            $this->cotizacionesEscalas[] = CotizacionEscala::create([
                'cotizacion_id' => $this->cotizacion->id,
                'direccion' => $request->direccion_escala[$key],
                'cp' => $request->cp_escala[$key],
            ]);
        }
    }

    /**
     * =======
     * GETTERS
     * =======
     */

    public function getTipoDespacho($request)
    {

        if ($request->despacho_importacion && $request->despacho_exportacion) {
            return 'importacion y exportacion';
        }

        if ($request->despacho_importacion) {
            return 'importacion';
        }

        if ($request->despacho_exportacion) {
            return 'exportacion';
        }
    }

    /**
     * =======
     * SENDERS
     * =======
     */

    public function enviarMensaje($request)
    {
        foreach ($request->usuarioMensaje as $correo) {
            if ($correo) {
                Mail::to($correo)->send(new NewProspectoMail);
            }
        }
    }
}
