@extends('layouts.blank')
@section('content')
<div class="card">
	<div class="card-header">
		<form id="buscarempleado" action="{{ url('getCotizaciones') }}">
			<!-- {{ csrf_field() }} -->
			<div class="row">
				<div class="col mt-3">
					<h4>Cotizaciones</h4>
				</div>
				<div class="col mt-3">
					<div class="input-group mb-3">
						<input type="text" list='browsers' id="empleado" name="query" class="form-control"
							placeholder="Buscar..." autofocus>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit"><i
									class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="card-body">
		@if(count($cotizaciones))
		<div id="datos" name="datos" class="container">
			<table class="table table-striped table-bordered table-hover"
				style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
				<thead>
					<tr class="info">
						<th>Folio</th>
						<th>Nombre</th>
						<th>Responsable</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				@foreach ($cotizaciones as $cotizacion)
				{{-- expr --}}
				<tr class="active" title="Has Click Aquì para Ver" style="cursor: pointer" href="#{{$cotizacion->id}}">
					<td>@if ($cotizacion->folio_consecutivo)
						{{$cotizacion->folio_consecutivo}}
						@else
						{{$cotizacion->id}}
						@endif</td>
					<td>
						@isset ($cotizacion->cliente)
						{{$cotizacion->cliente->razon_social}}
						@endisset
						@isset ($cotizacion->prospecto)
						{{$cotizacion->prospecto->razon_social}}
						@endisset
					</td>
					<td>{{$cotizacion->responsable}}</td>
					<td>{{$cotizacion->telefono}}</td>
					<td>{{$cotizacion->correo}}</td>
					<td>
						@isset ($cotizacion->cliente)
						<a class="btn btn-success btn-sm"
							href="{{ url('clientes/'.$cotizacion->cliente->id.'/'.$cotizacion->id.'/cotizacion/show') }}" /><i
							class="fa fa-eye" aria-hidden="true"></i>
						<strong>Ver</strong> </a>
						@endisset
						@isset ($cotizacion->prospecto)
						<a class="btn btn-success btn-sm"
							href="{{ url('prospectos/'.$cotizacion->prospecto->id.'/'.$cotizacion->id.'/show') }}" /><i
							class="fa fa-eye" aria-hidden="true"></i>
						<strong>Ver</strong> </a>
						@endisset
						{{-- @isset ($cotizacion->prospecto)
								    <a class="btn btn-success btn-sm" href="{{ route('prospectos.show',['cotizacion'=>$cotizacion]) }}"/><i
							class="fa fa-eye" aria-hidden="true"></i>
						<strong>Ver</strong> </a>
						@endisset --}}

					</td>

					{{-- <a class="btn btn-success btn-sm" href="{{ route('empleados.show',['empleado'=>$empleado]) }}"><i
						class="fa fa-eye" aria-hidden="true"></i>
					<strong>Ver</strong> </a>
					<a class="btn btn-info btn-sm" href="{{ route('empleados.edit',['empleado'=>$empleado]) }}">
						<i class="fas fa-edit"></i>
						<strong>Editar</strong>
					</a> --}}

				</tr>
				@endforeach
			</table>
			{{-- {{ $empleados->links() }} --}}
		</div>
		@else
		<div class="row">
			<h4 class="alert-danger">No hay coincidencias</h4>
		</div>
		@endif
	</div>
</div>
@endsection