@extends('layouts.blank')
@section('content')
	<div class="card">
		<div class="card-header">
			<div class="row">
                <div class="col-sm-4">
                    <h4>Datos del Usuario:</h4>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="{{ route('usuario.index') }}"><button class="btn btn-primary"><strong><i class="fa fa-eye" aria-hidden="true"></i> Ver Usuarios</strong></button></a>
                </div>
            </div>
		</div>
		<div class="card-body">
			<form action="{{ route('usuario.store') }}" method="post">    
			    {{ csrf_field() }}  
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">*Empleado:</label>
                        <select class="form-control" name="empleado_id" required="">
                            <option selected="">Seleccionar</option>
                            @foreach($empleados as $empleado)
                                @if($empleado->user == null)
                                    <option value="{{ $empleado->id }}">{{ $empleado->nombre . " " . $empleado->appaterno . " - " . $empleado->rfc }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4{{ $errors->has('name') ? ' has-error' : ' form-group' }}">
                        <label class="control-label">*Nombre de Usuario:</label>
                        <input type="text" name="name" class="form-control" required="">
                        @if ($errors->has('name'))
                            <label class="control-label"><strong>{{ $errors->first('name') }}</strong></label>
                        @endif
                    </div>
                    <div class="col-sm-4{{ $errors->has('password') ? ' has-error' : ' form-group' }}">
                        <label class="control-label">*Contraseña:</label>
                        <input type="text" name="password" class="form-control" required="">
                        @if ($errors->has('password'))
                            <label class="control-label"><strong>{{ $errors->first('password') }}</strong></label>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">*Perfil:</label>
                        <select class="form-control" name="perfil_id" required="">
                            <option selected="">Seleccionar</option>
                            @foreach($perfiles as $perfil)
                                @if($perfil->id == 1)
                                @else
                                    <?php $seguridad = false; ?>
                                    @foreach($perfil->componentes as $componente)
                                        @if($componente->modulo->nombre == "seguridad")
                                            <?php $seguridad = true; ?>
                                        @endif
                                    @endforeach
                                    @if(Auth::user()->perfil->id != 1 && $seguridad)
                                    @else
                                        <option value="{{ $perfil->id }}">{{ $perfil->nombre }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 text-center">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
                    </div>
                </div>
		    </form>
		</div>
		<div class="card-footer">
			<div class="row">
                <div class="col-sm-12 text-right">
                    <h4><small><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small> Campos Requeridos</small></small></h4>
                </div>
            </div>
		</div>
	</div>
@endsection