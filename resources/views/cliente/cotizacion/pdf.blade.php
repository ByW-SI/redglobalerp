<style type="css/text">

    h3{
    margin: 0;
}

.one-third{
    display: inline-block;
    width: 30%;
    margin-top: 10px;
    padding-left: 10px;
}

.text-center{
    text-align: center;
}

.border{
    border: 1px solid gray;
}

</style>

<h1 class="text-center">
    Cotizacion
</h1>
<br>
<div class="one-third border">
    <h2>Nombre</h2>
    <p>{{$cotizacion->nombre ? $cotizacion->nombre : 'N/D'}}</p>
</div>
<div class="one-third border">
    <h2>Responsable</h2>
    <p>{{$cotizacion->responsable}}</p>
</div>
<div class="one-third border">
    <h2>Teléfono</h2>
    <p>{{$cotizacion->tipo_servicio}}</p>
</div>
<br>
<div class="one-third border">
    <h2>Correo</h2>
    <p>{{$cotizacion->correo ? $cotizacion->correo : 'N/D'}}</p>
</div>
<div class="one-third border">
    <h2>Tipo servicio</h2>
    <p>{{$cotizacion->tipo_servicio}}</p>
</div>


{{-- DATOS DE ORIGEN --}}

<h1 class="text-center">
    Datos de origen
</h1>

<br>

<div class="one-third border">
    <h2>Línea de origen</h2>
    <p>{{$cotizacion->line1_origen}}</p>
</div>
<div class="one-third border">
    <h2>CP origen</h2>
    <p>{{$cotizacion->cp_origen}}</p>
</div>

{{-- DATOS DE DESTINO --}}

<h1 class="text-center">
    Datos de destino
</h1>

<br>

<div class="one-third border">
    <h2>Línea de destino</h2>
    <p>{{$cotizacion->line1_destino}}</p>
</div>

<div class="one-third border">
    <h2>CP origen</h2>
    <p>{{$cotizacion->cp_destino}}</p>
</div>

<div class="one-third border">
    <h2>ETA</h2>
    <p>{{$cotizacion->eta}}</p>
</div>

<br>

<div class="one-third border">
    <h2>¿Despacho aduanal?</h2>
    <p>{{$cotizacion->despacho_aduanal ? 'Sí' : 'No'}}</p>
</div>

<div class="one-third border">
    <h2>Es estiblable?</h2>
    <p>{{$cotizacion->es_estibable ? 'Sí' : 'No'}}</p>
</div>

<div class="one-third border">
    <h2>Tipo servicio</h2>
    <p>{{$cotizacion->tipo_servicio}}</p>
</div>

<br>
<br>
<br>
<br>
<br>
<br>

<div class="one-third border">
    <h2>Peso total</h2>
    <p>{{$cotizacion->peso_total_cot}}</p>
</div>

<div class="one-third border">
    <h2>Volumen total</h2>
    <p>{{$cotizacion->volumen_total_cot}}</p>
</div>

<h1 class="text-center">Mercancias</h1>

@foreach ($cotizacion->mercancias as $mercancia)

<br>

<div class="one-third border">
    <h2>Nombre</h2>
    <p>{{$mercancia->nombre}}</p>
</div>

<div class="one-third border">
    <h2>Naturaleza</h2>
    <p>{{$mercancia->naturaleza}}</p>
</div>

<div class="one-third border">
    <h2>Alto</h2>
    <p>{{$mercancia->alto}}</p>
</div>

<br>
<br>
<br>

<div class="one-third border">
    <h2>Ancho</h2>
    <p>{{$mercancia->ancho}}</p>
</div>

<div class="one-third border">
    <h2>Profundo</h2>
    <p>{{$mercancia->profundo}}</p>
</div>

<div class="one-third border">
    <h2>Medidas</h2>
    <p>{{$mercancia->medidas ? $mercancia->medidas : 'N/D'}}</p>
</div>

<br>

<div class="one-third border">
    <h2>Peso</h2>
    <p>{{$mercancia->medida_peso}}</p>
</div>

<div class="one-third border">
    <h2>Bultos</h2>
    <p>{{$mercancia->bultos}}</p>
</div>

<div class="one-third border">
    <h2>Volumen total</h2>
    <p>{{$mercancia->volumen_total}}</p>
</div>

<hr>

@endforeach