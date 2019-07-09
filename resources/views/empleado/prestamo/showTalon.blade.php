@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Talon de prestamo:</h4>
		</div>
		<div class="card-body">
			<div class="row form-group">	
				<div class="offset-5 col-4">
					<a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Volver</a>
				</div>
				<div class="card mx-auto mt-3" style="width: 25rem;">
					<img class="card-img-bottom" src="{{ url($prestamo->imagen_talon) }}" alt="talon de prestamo del empleado: {{ $empleado->fullname }}">			
				</div>
			</div>
		</div>
		
	</div>
@endsection