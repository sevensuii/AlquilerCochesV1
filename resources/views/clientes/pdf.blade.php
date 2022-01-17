 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<table id="tabla" class="table table-striped table-bordered">
	<thead>
		<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>DNI</th><th>Fecha de nacimiento</th><th>Correo</th><th>Dirección</th></tr>
	</thead>
	<tbody>
		@foreach($clientes as $cliente)
			<tr data-id="{{$cliente->id}}">
				<td>{{$cliente->id}}</td>
				<td>{{$cliente->nombre}}</td>
				<td>{{$cliente->apellidos}}</td>
				<td>{{$cliente->dni}}</td>
				<td>{{$cliente->f_nac}}</td>
				<td>{{$cliente->correo}}</td>
				<td>{{$cliente->direccion}}</td>
			</tr>
		@endforeach
	</tbody>	
</table>