@extends("layouts.app2")


@section("contenido")

	<h3>Formulario para @if (isset($cliente)) actualizar @else insertar @endif</h3>

<form method="POST" action="{{isset($cliente)?route("clientes.update",[$cliente->id]):route("clientes.store")}}">
  <div class="form-group">
    <label for="codigo">ID</label>
    <input type="text" class="form-control" id="id" name="id" value='{{$cliente->id??old("id")}}' readonly>
  </div>
  <div class="form-group">
    <label for="codigo">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre"  value='{{$cliente->nombre??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Apellidos</label>
    <input type="text" class="form-control" id="descripcion" name="apellidos"  value='{{$cliente->apellidos??''}}'>
  </div>
  <div class="form-group">
    <label for="direccion">DNI</label>
    <input type="text" class="form-control" id="precio" name="dni"  value='{{$cliente->dni??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Fecha de nacimiento</label>
    <input type="date" class="form-control" id="calorias" name="f_nac"  value='{{$cliente->f_nac??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Correo</label>
    <input type="text" class="form-control" id="codigo" name="correo"  value='{{$cliente->correo??''}}' placeholder="XXXX-A">
  </div>
	<div class="form-group">
    <label for="codigo">Dirección</label>
    {{-- <input type="date" class="form-control" id="f_alta" name="direccion" value='{{$cliente->direccion??''}}' readonly> --}}
    <input type="text" class="form-control" id="f_alta" name="direccion"  value='{{$cliente->direccion??''}}' >
  </div>
	@csrf
	
	@if (isset($cliente))
		<input type="hidden" name="_method" value="PUT">
	@endif
  <button type="submit" class="btn btn-primary">{{isset($cliente)? 'Actualizar':'Insertar'}}</button>
  <a href="{{route('clientes.index')}}" class="btn btn-secondary">Volver</a>
</form>


@endsection