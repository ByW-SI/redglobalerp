<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;


class Cotizacion extends Model
{
    //
    use SoftDeletes;
    use Sortable;

    protected $fillable=[
    	'nombre',
    	'responsable',
    	'telefono',
    	'correo',
        //añadido
        'folio_consecutivo',        
        'prospecto_id',//****
        'line1_origen',
        'cp_origen',
        'line1_destino',
        'cp_destino',
        'tipo_servicio',
        'eta',
        'despacho_aduanal',
        'es_estibable',
        'peligroso_clase',
        'peligroso_nu',
        'peso_total_cot',
        'volumen_total_cot',
        'tipo_despacho',
        'custodia_desde',
        'custodia_hasta',
        'observaciones',
        'prospecto_id'
    ];

    public $sortable = [
        'razon_social',
        'telefono',
        'celular',
        'correo',
    ];

    protected $hidden = ['created_at', 'updated_at'];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function prospecto()
    {
        return $this->belongsTo('App\Prospecto');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function Empleado()
    {
        return $this->belongsTo('App\Empleado');
    }

    public function mercancias()
    {
        return $this->hasMany('App\Mercancia');
    }
    
    public function cotizacionFcl(){
        return $this->hasOne('App\CotizacionFcl');
    }

    
}
