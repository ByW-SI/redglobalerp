<?php

namespace App\Services\Cotizacion;

use App\Cotizacion;
use App\User;

class IndexCotizacionService
{
    protected $user;
    protected $cotizaciones;

    public function __construct(User $user)
    {
        $this->user = $user;

        if ($user->esAdmin()) {
            $this->cotizaciones = Cotizacion::get();
        }

        $this->cotizaciones = $user->cotizacions;
    }

    public function getCotizaciones()
    {
        return $this->cotizaciones;
    }
}
