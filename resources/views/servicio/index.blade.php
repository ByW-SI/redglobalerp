
@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-lg-6">
					<form action="{{ $buscar }}">
						<div class="input-group">
							<input type="text" name="query" class="form-control" placeholder="Buscar...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</span>
						</div>
					</form>
				</div>
				<div class="col-lg-6">
					<a class="btn btn-success" href="{{ route($agregar) }}">Nuevo {{$titulo}}</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
				<thead>
					<tr class="info">
						<th>#</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Operacion</th>
					</tr>
					</thead>
					<tbody>
						@forelse($servicios as $servicio)
							<tr class="active">
								<td>
									{{ $servicio->id }}
								</td>
								<td>{{ $servicio->nombre }}</td>
								<td>{{ $servicio->descripcion }}</td>
								<td>
									<div class="row justify-content-center">
										<div class="col-4">
											<a class="btn btn-info btn-sm" href="{{ route($editar,['servicio'=>$servicio]) }}"><i class="fas fa-edit"></i> Editar</a>
											
										</div>
										<div class="col-4">
											<form role="form" 
											method="POST" 
											action="{{ route($borrar,['servicio'=>$servicio]) }}"
											id="eliminar {{ $servicio->id }}">
												{{ csrf_field() }}
												<input type="hidden" name="_method" value="DELETE">
											<button type="submit" onclick="deleteFunction('eliminar {{ $servicio->id }}')" class="btn btn-danger btn-sm" ><i class="fa fa-trash" aria-hidden="true"></i> Borrar</button>
											</form>
										</div>
									</div>
								</td>
							</tr>
						@empty
							<div class="alert alert-danger" role="alert">
							  No sé encontraron registros
							</div>
						@endforelse
					</tbody>
				</table>
			</div>
			<div class="row">
				{{ $servicios->links()}}
			</div>
		</div>
	</div>
@endsection