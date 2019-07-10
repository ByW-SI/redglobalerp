@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Prestamos:</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">
				<div class="offset-5 col-4">
					<a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Volver</a>
				</div>
			</div>
			<form role="form" method="POST" action="{{ route('storeTalon',['empleado'=>$empleado, 'prestamo'=>$prestamo]) }}" enctype="multipart/form-data">
				@csrf
				<div class="row form-group">
					<div class="col-3 offset-4 col-sm-12 col-md-4 col-xl-4 form-group">
		    			<label for="ficha_deposito_path">Talon de prestamo</label>
		    			<input id="input-id" type="file" accept=".pdf, .jpg, .jpeg, .png" class="file" name="talon_path" data-preview-file-type="text">
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