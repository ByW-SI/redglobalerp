<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Prospecto extends Model
{
    use Sortable;
    
	 protected $fillable = [
    	'razon_social',
    	'telefono',
    	'celular',
    	'correo'
    ];

    public $sortable = [
        'razon_social',
        'telefono',
        'celular',
        'correo',
    ];

    protected $hidden=['created_at','updated_at'];

    public function cotizacions(){
        return $this->hasMany('App\Cotizacion');
    }
}
