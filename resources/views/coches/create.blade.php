@extends("layouts.app2")


@section("contenido")

	<h3>Formulario para @if (isset($coche)) actualizar @else insertar @endif</h3>

<form method="POST" action="{{isset($coche)?route("coches.update",[$coche->id]):route("coches.store")}}">
  <div class="form-group">
    <label for="codigo">ID</label>
    <input type="text" class="form-control" id="id" name="id" value='{{$coche->id??old("id")}}' readonly>
  </div>
  <div class="form-group">
    <label for="codigo">Matrícula</label>
    <input type="text" class="form-control" id="nombre" name="matricula"  value='{{$coche->matricula??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Marca</label>
    <input type="text" class="form-control" id="descripcion" name="marca"  value='{{$coche->marca??''}}'>
  </div>
  <div class="form-group">
    <label for="direccion">Modelo</label>
    <input type="text" class="form-control" id="precio" name="modelo"  value='{{$coche->modelo??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Año</label>
    <input type="text" class="form-control" id="calorias" name="año"  value='{{$coche->año??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Combustible</label>
    <input type="text" class="form-control" id="codigo" name="combustible"  value='{{$coche->combustible??''}}' placeholder="XXXX-A">
  </div>
	<div class="form-group">
    <label for="codigo">Obersvaciones</label>
    <input type="text" class="form-control" id="f_alta" name="observaciones"  value='{{$coche->observaciones??''}}' >
  </div>
	@csrf
	
	@if (isset($coche))
		<input type="hidden" name="_method" value="PUT">
	@endif
  <button type="submit" class="btn btn-primary">{{isset($coche)? 'Actualizar':'Insertar'}}</button>
  <a href="{{route('coches.index')}}" class="btn btn-secondary">Volver</a>
</form>


@endsection