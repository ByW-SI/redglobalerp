@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Nuevo Prestamo:</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">
				<div class="offset-5 col-4">
					<a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Volver</a>
				</div>
			</div>
			<form role="form" method="POST" action="{{ route('empleados.prestamos.store',['empleado'=>$empleado]) }}">
				@csrf
				<div class="row form-group">
					<div class="col-3 offset-2">
						<label for="tipopermiso" class="control-label">Fecha</label>
						<input type="date" name="fecha" class="form-control" required="">
					</div>
					<div class="col-3">
						<label for="permiso" class="control-label">Monto</label>
						<input type="text" name="monto" class="form-control" required="" id="monto">
					</div>
					<div class="col-3">
						<label for="fecha" class="control-label">Número de pagos</label>
						<select name="numero_pagos" class="form-control" id="numnero_pagos" required="">
							<option value="">Seleccionar</option>
							<option value="12 quincenas">12 quincenas</option>
							<option value="6 meses">6 meses</option>
						</select>
						{{-- <input type="number" name="numero_pagos" class="form-control" id="numnero_pagos" step="1" required=""> --}}
					</div>
				</div>
				<div class="row form-group">
					<div class="col-3 offset-2">
						<label for="descuento_nomina" class="control-label">Descuento por Nómina</label>
						<div class="form-check">
							<input type="radio" name="descuento_nomina" class="form-check-input" id="descuento_nomina" value="Si">
							<label class="form-check-label" for="exampleRadios2">Si</label>
						</div>
						<div class="form-check">
							<input type="radio" name="descuento_nomina" class="form-check-input" id="descuento_nomina" value="No">
							<label class="form-check-label" for="exampleRadios2">No</label>
						</div>
					</div>
					<div class="col-3">
						<label for="fecha" class="control-label">Adelanto de Nómina</label>
						<select name="adelanto_nomina" class="form-control" id="numnero_pagos" >
							<option value="">Seleccionar</option>
							<option value="un sueldo">Un Sueldo</option>
							<option value="sueldo y medio">Sueldo y Medio</option>
						</select>
					</div>
					<div class="col-3">
						<label for="fecha" class="control-label">Interés</label>
						<select name="interes" class="form-control" id="numnero_pagos" required="">
							<option value="">Seleccionar</option>
							<option value="3">3%</option>
							<option value="6">6%</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-6 offset-2">
						<label  class="control-label">Razon del Prestamo</label>
						<textarea name="motivo" id="motivo" cols="30" rows="5" class="form-control" ></textarea>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-success">
						 	<strong>Guardar</strong>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		$('#monto').on({
			"focus": function (event) {
		        $(event.target).select();
		    },
		    "keyup": function (event) {
		        $(event.target).val(function (index, value ) {
		            return value.replace(/\D/g, "")
		                        .replace(/([0-9])([0-9]{2})$/, '$1.$2')
		                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
		        });
		    }
		});
	</script>
@endsection