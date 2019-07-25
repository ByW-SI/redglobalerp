@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<form id="buscarempleado" action="{{ url('getProspectos') }}">
			<!-- {{ csrf_field() }} -->
				<div class="row">
					<div class="col mt-3">
						<h4>Prospectos:</h4>
					</div>
					<div class="col mt-3">
						<div class="input-group mb-3">
							<input type="text" id="prospecto" name="query" class="form-control" placeholder="Buscar..." autofocus>
							<div class="input-group-append">
							    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
							 </div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="card-body">
			<div class="row form-group">
				<div class="offset-5 col-4">
					<a href="{{ route('prospectos.create') }}" class="btn btn-success">Nuevo</a>
				</div>
			</div>
			@if(count($prospectos))

			<div class="row form-group" id="prospectos-table">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr class="table-info">
							<th>#</th>
							<th>Razon social</th>
							<th>correo</th>							
							<th>Telefono</th>
							<th>Celular</th>
							{{-- <th># de cotizaciones realizadas</th> --}}
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($prospectos as $prospecto)
							<tr>
								<td>{{$prospecto->id}}</td>
								<td>{{$prospecto->razon_social}}</td>
								<td>{{$prospecto->correo}}</td>
								<td>{{$prospecto->telefono}}</td>
								<td>{{$prospecto->celular}}</td>		
								<td>
									<div class="row">
										<div class="col-6 d-flex flex-column">
											<a class="btn btn-primary" href="{{ route('prospectos.show',['prospecto'=>$prospecto]) }}">Ver prospecto</a>			
										</div>
										<div class="col-6 d-flex flex-column">
											<a class="btn btn-success" href="{{ url('prospectos/'.$prospecto->id.'/cliente') }}">Hacer cliente</a>			
										</div>
									</div>
									
								</td>
							</tr>
						@empty
							<div class="container alert alert-danger" role="alert">
							  	No se encontraron registros de prospectos.
							</div>
						@endforelse
					</tbody>
				</table>
			</div>
			<div class="d-flex justify-content-center">
				{{ $prospectos->links() }}
			</div>
			@else
				<div class="row">
				    <h4 class="alert-danger">No hay coincidencias</h4>
				</div>
				
			@endif
		</div>
	</div>
@endsection
@section('script')
<script>
	function buscar() {
		var val = $('#prospecto').val();
		$.ajax({
			url : "buscarProspecto",
			type : "GET",
			dataType : "html",
			data : {
				query : val
			},
		}).done(function(res) {
			$("#prospectos-table").html(res);
		}).fail(function (error) {
			console.log(error)
		});
	}
</script>
@endsection