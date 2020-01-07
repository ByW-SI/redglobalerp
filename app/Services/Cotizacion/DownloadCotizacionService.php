<?php

namespace App\Services\Cotizacion;

use App\Cotizacion;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Response;

class DownloadCotizacionService
{

    protected $cotizacion;

    public function __construct(Cotizacion $cotizacion)
    {
        $this->cotizacion = $cotizacion;
    }
    
    public function download()
    {
        $pdf = PDF::loadView('cliente.cotizacion.pdf', ['cotizacion' => $this->cotizacion]);
        return $pdf->download('cotizacion.pdf');
    }
}
