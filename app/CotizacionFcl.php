<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizacionFcl extends Model
{
    protected $table = "cotizaciones_fcl";
    protected $fillable = ["cotizacion_id", "contenedor_maritimo"];
}
