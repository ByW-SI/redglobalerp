<?php

namespace App\Services\Prospecto;

use App\Cotizacion;
use App\CotizacionFcl;
use App\CotizacionFtl;
use App\Mercancia;
use App\Prospecto;
use App\Servicio;
use Illuminate\Http\Request;

class StoreProspectoService
{

    protected $prospecto;

    public function __construct(Request $request)
    {

        // dd($request->input('observaciones_servicio'));

        $this->crearProspecto($request);

        $cotizacion = new Cotizacion([
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
        ]);
        $cotizacion->prospecto_id = $this->prospecto->id;
        if ($request->despacho_aduanal)
            $cotizacion->despacho_aduanal = true;
        else
            $cotizacion->despacho_aduanal = false;

        $cotizacion->save();

        if($request->tipo_servicio == 'Terrestre FTL'){

            CotizacionFtl::create([
                'cotizacion_id' => $cotizacion->id,
                'tipo_unidad' => $request->tipo_unidad,
                'unidad' => $request->unidad,
                'es_sobredimensionado' => $request->es_sobredimensionado,
                'capacidad_refrigerante' => $request->capacidad_refrigerante,
                'temperatura' => $request->temperatura,
            ]);
        }

        if($request->tipo_servicio == 'Maritimo FCL'){

            CotizacionFcl::create([
                'cotizacion_id' => $cotizacion->id,
                'contenedor_maritimo' => $request->contenedor_maritimo,
            ]);

        }

        foreach ($request->nombre as $key => $nombre) {
            //dd($request->despacho_aduanal[$key]);
            $mercancia = new Mercancia([

                'nombre' => $nombre,
                // 'line1_origen'=>$request->linea1_origen[$key],                
                // 'cp_origen'=>$request->cp_origen[$key],
                // 'line1_destino'=>$request->linea1_destino[$key],                
                // 'cp_destino'=>$request->cp_destino[$key],
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
                // 'tipo_servicio'=>$request->tipo_servicio[$key],
                'observaciones' => $request->observaciones[$key],
                // 'eta'=>$request->eta[$key],
                // 'peligroso_clase'=>$request->peligroso_clase[$key],
                // 'peligroso_nu'=>$request->peligroso_nu[$key]
            ]);
            $mercancia->cotizacion_id = $cotizacion->id;
            $mercancia->save();
            if (isset($request->servicio)) {
                for ($i = 0; $i < count($request->servicios[$key]); $i++) {
                    $aux = Servicio::find($request->servicios[$key][$i]);
                    $mercancia->servicios()->attach($aux, ['comentario' => $request->comentario_serv[$key][$i]]);
                }
            }
            $mercancia->save();
        }
    }

    protected function crearProspecto($request)
    {
        $this->prospecto = Prospecto::create([
            'razon_social' => $request->razon_social,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'correo' => $request->correo
        ]);
    }

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
}
