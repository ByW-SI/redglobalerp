@extends('layouts.blank')
@section('content')
	<div class="card">
		<form method="POST" action="{{ route('prospectos.store') }}">
			@csrf
			<div class="card-header">
				<h4>Solicitud de cotización: <span class="badge badge-secondary"><i class="fas fa-asterisk"></i> Campos obligatorios</span></h4>
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
						<label class="control-label"><i class="fas fa-asterisk"></i> Número telefonico del prospecto:</label>
						<input class="form-control" type="text" name="telefono" required="">
					</div>
					<div class="form-group col-4">
						<label class="control-label"><i class="fas fa-asterisk"></i> Número de celular del prospecto:</label>
						<input class="form-control" type="text" name="celular" required="">
					</div>
					<div class="form-group col-4">
						<label class="control-label"><i class="fas fa-asterisk"></i> Correo electrónico del prospecto:</label>
						<input class="form-control" type="email" name="correo" required="">
					</div>
					<div class="col-4 form-group">
                        <label>
                            <i class="fas fa-asterisk"></i> Tipo de servicio:
                        </label>
                        <select  class="form-control" id="tipo_servicio" name="tipo_servicio" required ref="selectServicio">
                            <option value="">Seleccione una opción</option>
                            <option value="Terrestre FTL">Terrestre FTL</option>
                            <option value="Terrestre LTL">Terrestre LTL</option>
                            <option value="Maritimo FCL">Maritimo FCL</option>
                            <option value="Maritimo LCL">Maritimo LCL</option>
                            <option value="Aereo">Aereo</option>
                            <option value="Ferroviario">Ferroviario</option>
                        </select>
                    </div>
                    <div class="col-12 mb-2">
                        <h4 class="title">
                            Material peligroso <input type="checkbox" id="Peligroso">
                        </h4>
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
                    <div class="col-4 form-group">
                        <label><i class="fas fa-question-circle"></i>Requiere despacho aduanal</label>
                        <input type="checkbox" id="despacho_aduanal" name="despacho_aduanal">
                    </div>
                    <div class="col-4 form-group" id="estibable">
                        <label><i class="fas fa-question-circle"></i>¿Es estibable?</label>
                        <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" id="inlineCheckboxSI" name="es_estibable" value="1" disabled="">
						  <label class="form-check-label" for="inlineCheckboxSI">Si</label>
						</div>
						<div class="form-check form-check-inline disabled">
						  <input class="form-check-input" type="radio" id="inlineCheckboxNO" name="es_estibable" value="0" disabled="">
						  <label class="form-check-label" for="inlineCheckboxNO">No</label>
						</div>
                    </div>
				</div>
			</div>
			{{-- <example-component :animal="{data: this.$refs}" ></example-component> --}}
			<mercancias-component></mercancias-component>
			<servicios-component></servicios-component>
            <div class="card-footer">
                <div class="form-group col-4">
                    <label class="control-label"><i class="fas fa-asterisk"></i> Total Volumen:</label>
                    <input class="form-control" min="0" type="number" name="volumen_total" required="" id="volumen_total">
                </div>
                <div class="form-group col-4">
                    <label class="control-label"><i class="fas fa-asterisk"></i> Total Peso:</label>
                    <input class="form-control" min="0" type="number" name="peso_total" required="" id="peso_total">
                </div>
            </div>
			<div class="d-flex justify-content-center mb-3">
				<button type="submit" class="btn btn-success btn-lg" >
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
    </script>
@endsection