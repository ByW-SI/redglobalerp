<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizacionEscala extends Model
{
    protected $table = "cotizacion_escalas";
    protected $fillable = ["cotizacion_id", "direccion", "cp"];
}
