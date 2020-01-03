@extends('layouts.blank')
@section('content')
<div class="card">
    <form method="POST" action="{{ route('prospectos.store') }}">
        @csrf
        <div class="card-header">
            <h4>Solicitud de cotización: <span class="badge badge-secondary"><i class="fas fa-asterisk"></i> Campos
                    obligatorios</span></h4>
        </div>
        <div class="card-body">
            @csrf
            <div class="form-row">
                <div class="form-group col-4">
                    <label class="control-label"><i class="fas fa-asterisk"></i> Nombre completo del prospecto:</label>
                    <input class="form-control" type="text" name="responsable" required="">
                </div>
                <div class="form-group col-4">
                    <label class="control-label"><i class="fas fa-asterisk"></i> Razon social:</label>
                    <input class="form-control" type="text" name="razon_social" required="">
                </div>
                <div class="form-group col-4">
                    <label class="control-label"><i class="fas fa-asterisk"></i> Número telefonico del
                        prospecto:</label>
                    <input class="form-control" type="text" name="telefono" required="">
                </div>
                <div class="form-group col-4">
                    <label class="control-label"><i class="fas fa-asterisk"></i> Número de celular del
                        prospecto:</label>
                    <input class="form-control" type="text" name="celular" required="">
                </div>
                <div class="form-group col-4">
                    <label class="control-label"><i class="fas fa-asterisk"></i> Correo electrónico del
                        prospecto:</label>
                    <input class="form-control" type="email" name="correo" required="">
                </div>
                <div class="col-4 form-group">
                    <label>
                        <i class="fas fa-asterisk"></i> Tipo de servicio:
                    </label>
                    <select class="form-control" id="tipo_servicio" name="tipo_servicio" required=""
                        ref="selectServicio">
                        <option value="">Seleccione una opción</option>
                        <option value="Terrestre FTL">Terrestre FTL</option>
                        <option value="Terrestre LTL">Terrestre LTL</option>
                        <option value="Maritimo FCL">Maritimo FCL</option>
                        <option value="Maritimo LCL">Maritimo LCL</option>
                        <option value="Aereo">Aereo</option>
                        <option value="Ferroviario">Ferroviario</option>
                    </select>
                </div>
                {{-- INPUT TIPO DE UNIDAD --}}
                <div class="col-4 form-group inputDeTipoServicio" id="contenedorInputTipoUnidad" style="display: none;">
                    <label for="">
                        Tipo de unidad
                    </label>
                    <select name="tipo_unidad" id="" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="3 1/2">3 1/2</option>
                        <option value="Torton">Torton</option>
                        <option value="Rabon">Rabon</option>
                        <option value="48">48</option>
                        <option value="53">53</option>
                    </select>
                </div>
                {{-- INPUT UNIDAD --}}
                <div class="col-4 form-group inputDeTipoServicio" id="contenedorInputUnidad" style="display: none;">
                    <label for="">
                        Unidad
                    </label>
                    <select name="unidad" id="" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="Plataforma">Plataforma</option>
                        <option value="Low Boy">Low Boy</option>
                        <option value="Cama baja">Cama baja</option>
                        <option value="PortaChasis">PortaChasis</option>
                    </select>
                </div>
                {{-- INPUT ES SOBREDIMENSIONADO --}}
                <div class="col-4 form-group inputDeTipoServicio" id="contenedorInputEsSobredimensionado"
                    style="display: none;">
                    <label for="">
                        ¿Es sobredimensionado?
                    </label>
                    <select name="es_sobredimensionado" id="" class="form-control">
                        <option value="No">No</option>
                        <option value="Sí">Sí</option>
                    </select>
                </div>
                {{-- INPUT CAPACIDAD REFRIGERANTE --}}
                <div class="col-4 form-group inputDeTipoServicio" id="contenedorInputCapacidadRefrigerante"
                    style="display: none;">
                    <label for="">
                        Capacidad refrigerante
                    </label>
                    <select name="capacidad_refrigerante" id="" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="20">20</option>
                        <option value="48">48</option>
                        <option value="53">53</option>
                    </select>
                </div>
                {{-- INPUT TEMPERATURA --}}
                <div class="col-4 form-group inputDeTipoServicio" id="contenedorInputTemperatura"
                    style="display: none;">
                    <label for="">
                        Temperatura
                    </label>
                    <input type="text" class="form-control" name="temperatura">
                </div>
                {{-- INPUT CONTENEDOR MARITIMO --}}
                <div class="col-4 form-group inputDeTipoServicio" id="contenedorInputContenedorMaritimo"
                    style="display: none;">
                    <label for="">
                        Contenedor marítimo
                    </label>
                    <select name="contenedor_maritimo" id="" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="20">20</option>
                        <option value="40">40</option>
                        <option value="40 HQ">40 HQ</option>
                    </select>
                </div>
                {{-- INPUT ES MATERIAL PELIGROSO --}}
                <div class="col-12 mb-2">
                    <h4 class="title">
                        Material peligroso <input type="checkbox" id="Peligroso">
                    </h4>
                </div>
                {{-- INPUT TEMPERATURA --}}
                <div class="col-4 form-group inputDeTipoServicio" id="contenedorInputObservaciones"
                    style="display: none;">
                    <label for="">
                        Observaciones
                    </label>
                    <textarea name="observaciones_servicio" id="inputObservaciones" class="form-control" cols="30"
                        rows="10" maxlength="150"></textarea>
                </div>
                <div class="col-4 form-group" id="clase_peligrosa" style="display: none">
                    <label><i class="fas fa-asterisk"></i> Clase</label>
                    <input type="number" class="form-control" name="peligroso_clase" max="9" min="1"></input>
                </div>
                <div class="col-4 form-group" id="nu_peligroso" style="display: none">
                    <label><i class="fas fa-asterisk"></i> NU</label>
                    <input type="text" class="form-control" name="peligroso_nu">
                </div>
                <div class="col-12 mb-2">
                    <h4 class="title">
                        Dirección de origen
                    </h4>
                </div>
                <div class="col-4 form-group">
                    <label><i class="fas fa-asterisk"></i> Linea 1</label>
                    <textarea rows="1" type="text" class="form-control" name="linea1_origen" required=""></textarea>
                </div>
                <div class="col-4 form-group">
                    <label><i class="fas fa-asterisk"></i> Código Postal</label>
                    <input type="text" class="form-control" name="cp_origen" required="">
                </div>

                <div class="col-12 mb-2">
                    <h4 class="title">
                        Dirección de destino
                    </h4>
                </div>
                <div class="col-4 form-group">
                    <label><i class="fas fa-asterisk"></i> Linea 1</label>
                    <textarea rows="1" type="text" class="form-control" name="linea1_destino" required=""></textarea>
                </div>
                <div class="col-4 form-group">
                    <label><i class="fas fa-asterisk"></i> Código Postal</label>
                    <input type="text" class="form-control" name="cp_destino" required="">
                </div>

                <div class="col-4 form-group">
                    <label><i class="fas fa-asterisk"></i> eta</label>
                    <input type="date" class="form-control" name="eta" required="">
                </div>

                <div class="col-4 form-group" id="estibable">
                    <label><i class="fas fa-question-circle"></i>¿Es estibable?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckboxSI" name="es_estibable" value="1"
                            disabled="" required="">
                        <label class="form-check-label" for="inlineCheckboxSI">Si</label>
                    </div>
                    <div class="form-check form-check-inline disabled">
                        <input class="form-check-input" type="radio" id="inlineCheckboxNO" name="es_estibable" value="0"
                            disabled="">
                        <label class="form-check-label" for="inlineCheckboxNO">No</label>
                    </div>
                </div>
            </div>

            {{-- INPUT DESPACHO ADUANAL --}}
            <div class="col-12 mb-2">
                <h4 class="title">
                    <label><i class="fas fa-question-circle"></i>¿Requiere despacho aduanal?</label>
                    <input type="checkbox" id="despacho_aduanal" name="despacho_aduanal">
                </h4>
            </div>
            {{-- INPUT ES DEPSACHO DE IMPORTACION --}}
            <div class="col-4 form-group" id="contenedorInputDespachoImportacion" style="display: none">
                <label>Despacho de importación</label>
                <input type="checkbox" class="form-control" name="despacho_importacion" class="tipoDespacho"
                    id="inputDespachoImportacion">
            </div>
            {{-- INPUT ES DESPACHO DE EXPORTACION --}}
            <div class="col-4 form-group" id="contenedorInputDespachoExportacion" style="display: none">
                <label><i class="fas fa-asterisk"></i>Despacho de exportación</label>
                <input type="checkbox" class="form-control" name="despacho_exportacion" class="tipoDespacho"
                    id="inputDespachoExportacion">
            </div>

            {{-- INPUT REQUIERE CUSTODIA --}}
            <div class="col-12 mb-2">
                <h4 class="title">
                    <label><i class="fas fa-question-circle"></i>¿Requiere requiere custodia?</label>
                    <input type="checkbox" id="inputRequiereCustodia">
                </h4>
            </div>
            {{-- INPUT CUSTODIA DESDE --}}
            <div class="col-4 form-group" id="contenedorInputCustodiaDesde" style="display: none">
                <label>Desde</label>
                <input type="text" class="form-control" name="custodia_desde" class="tipoDespacho"
                    id="inputCustodiaDesde" maxlength="60">
            </div>
            {{-- INPUT CUSTODIA HASTA --}}
            <div class="col-4 form-group" id="contenedorInputCustodiaHasta" style="display: none">
                <label>Hasta</label>
                <input type="text" class="form-control" name="custodia_hasta" class="tipoDespacho"
                    id="inputCustodiaHasta" maxlength="60">
            </div>

        </div>
        {{-- <example-component :animal="{data: this.$refs}" ></example-component> --}}
        <mercancias-component></mercancias-component>
        <div class="card-footer">
            <div class="form-group col-4">
                <label class="control-label">Total Volumen:</label>
                <input class="form-control" step="0.01" min="0" type="number" name="volumen_total_cot" required=""
                    id="volumen_total">
            </div>
            <div class="form-group col-4">
                <label class="control-label"><i class="fas fa-asterisk"></i> Total Peso:</label>
                <input class="form-control" step="0.01" min="0" type="number" name="peso_total_cot" required=""
                    id="peso_total">
            </div>
        </div>
        <div class="d-flex justify-content-center mb-3">
            <button type="submit" class="btn btn-success btn-lg">
                <strong>
                    <i class="far fa-save"></i>
                    Guardar
                </strong>
            </Button>
        </div>
    </form>
</div>
@endsection
@section('script')
<script>
    var valor = new Vue();

        //vm.$refs = data;
        $(document).ready(function() {
        //set initial state.
        //$('#textbox1').val($(this).is(':checked'));

        $('#Peligroso').change(function() {
            if(this.checked) {
                //alert('checked');
                $('#clase_peligrosa').show();
                $('#nu_peligroso').show();
            }
            else{
                $('#clase_peligrosa').hide();
                $('#nu_peligroso').hide();
            }
        });
        $('#tipo_servicio').change(function(event) {
            //console.log($('#tipo_servicio option:selected').val());
            if ($('#tipo_servicio option:selected').val() != '') {
                $('#inlineCheckboxSI').prop('disabled', false);
                $('#inlineCheckboxNO').prop('disabled', false);
            }
            else{
                $('#inlineCheckboxSI').prop('disabled', true);
                $('#inlineCheckboxNO').prop('disabled', true);   
            }
        });
        $('input[name=es_estibable]').click(function(event) {
            console.log($(this).val());
        });
    });

$(document).on('change', '#despacho_aduanal', function(){

    var esDespachoAduanal = $(this).val();

    if( $(this).val() == 1){
        $(this).val(0);
    }else{
        $(this).val(1);
    }

    console.log($(this).val());

    if($(this).val() == 1){
        $('#contenedorInputDespachoImportacion').show();
        $('#contenedorInputDespachoExportacion').show();
        return;  
    }

    $('#contenedorInputDespachoImportacion').hide();
    $('#inputDespachoImportacion').val(0);
    $('#contenedorInputDespachoExportacion').hide();
    $('#inputDespachoExportacion').val(0);

})

$(document).on('change','#inputRequiereCustodia', function(){

    if( $(this).val() == 1){
        $(this).val(0);
    }else{
        $(this).val(1);
    }

    if($(this).val() == 1){
        $('#contenedorInputCustodiaDesde').show();
        $('#contenedorInputCustodiaHasta').show();
        return;  
    }

    $('#contenedorInputCustodiaDesde').hide();
    $('#contenedorInputCustodiaHasta').hide();

});

$(document).on('change', '#tipo_servicio', function(){

    const tipoServicio = $(this).val();
    console.log(tipoServicio);

    esconderInputsDeServicio();

    if(tipoServicio == 'Terrestre FTL'){
        mostrarInputsFtl();
        return;
    }

    if(tipoServicio == 'Maritimo FCL'){
        mostrarInputsFcl();
        return;
    }

    if(tipoServicio == 'Terrestre LTL' || tipoServicio == 'Maritimo LCL' || tipoServicio == 'Aereo' || tipoServicio == 'Ferroviario'){
        mostrarInputsOtroTipoDeServicio();
    }
});

function esconderInputsDeServicio(){
    $('.inputDeTipoServicio').each(function(){
        $(this).hide();
    });
}

function mostrarInputsFcl(){
    $('#contenedorInputContenedorMaritimo').show();
}

function mostrarInputsOtroTipoDeServicio(){
    $('#contenedorInputObservaciones').show();
}

function mostrarInputsFtl(){
    $('#contenedorInputTipoUnidad').show();
    $('#contenedorInputUnidad').show();
    $('#contenedorInputEsSobredimensionado').show();
    $('#contenedorInputCapacidadRefrigerante').show();
    $('#contenedorInputTemperatura').show();
}

</script>
@endsection