<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizacionFtl extends Model
{
    protected $table = "cotizaciones_ftl";
    protected $fillable = ["cotizacion_id", "tipo_unidad", "es_sobredimensionado", "unidad", "capacidad_refrigerante", "temperatura"];
}
