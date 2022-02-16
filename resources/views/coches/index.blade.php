
@extends('layouts.app2')


@section("contenido")
<!-- <a href='{{url("coches/restore")}}' class="btn btn-info">Restaurar</a>
<a href='{{url("coches/eliminar")}}' class="btn btn-danger">Borrado Definitivo</a> -->
<h1 class="text-3xl text-white">Coches</h1>
<a href="{{route('coches.create')}}" class="btn btn-success my-4">+ Insertar</a>
<!-- <a href="{{route('clientes.pdf')}}" class="btn btn-warning my-4">Generar PDF</a> -->
<table id="tabla" style="text-align: center;">
	<thead>
		<tr><th>Matrícula</th><th>Marca</th><th>Modelo</th><th>Año</th><th>Combustible</th><th>Observaciones</th><th>Borrar</th><th>Editar</th></tr>
	</thead>
	<tbody>
	@foreach($coches as $coche)
		<tr data-id="{{$coche->id}}">
			<td>{{$coche->matricula}}</td>
			<td>{{$coche->marca}}</td>
			<td>{{$coche->modelo}}</td>
			<td>{{$coche->año}}</td>
			<td>{{$coche->combustible}}</td>
			<td>{{$coche->observaciones}}</td>
			<td><img class='btn_borrar' width="32px" src="https://cdn.iconscout.com/icon/free/png-256/recycle-bin-1-461646.png"></td>
			<td><a href='{{url("coches/$coche->id/edit")}}'><img class='btn_editar' width="32px" src="https://cdn.iconscout.com/icon/free/png-256/edit-2653317-2202989.png"></a></td>
    </tr>
		
		
	@endforeach
	</tbody>	
</table>


<!-- Modal -->
<div class="modal fade" id="pedidos_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Publicacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal_body" class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="comentarios_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Publicacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal_body_comentarios" class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>




<script>
	$(document).ready(function(){
		$("#tabla").DataTable({
			language: { url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
            rowReorder: true,
            columnDefs: [
            { orderable: true, className: 'reorder', targets: 0 },
            { orderable: false, targets: '_all' }
            ]
		});
		
		
		
		$(".show_publicaciones").click(function(){
            const UsuarioId=$(this).closest("tr").data("id");
            $.ajax({
                url    : "{{url('/publicaciones/listado')}}/"+UsuarioId,
                success: function(datos){
					let htmlTable="<table class='table table-bordered table-striped'>";
					htmlTable+="<tr><th>Titulo</th><th>Publicacion</th><th>Comentarios</th><th>Likes</th><th>Fecha</th></tr>"
                    $("#modal_body").html("");
                    for(let i=0;i<datos.length;i++){
                      htmlComentarios=`<a href='#' class='show_comentarios' data-id='${datos[i].id}'>${datos[i].num_comentarios}</a>`;
						htmlTable+=`<tr data-id='${datos[i].id}'><td>${datos[i].titulo}</td><td>${datos[i].publicacion}</td><td>${htmlComentarios}</td><th>0</th><td>${datos[i].fecha}</td></tr>`;
                    }
					htmlTable+="</table>";
                    $("#modal_body").append(htmlTable);
                    $("#pedidos_modal").modal();


                }
            })    
        })
		
		
        $("body").on("click",".show_comentarios", function(e){
            e.preventDefault();
            console.log("estoy aqui");

            const publicacionId=$(this).closest("tr").data("id");
            $.ajax({
                url    : "{{url('/comentarios/listado')}}/"+publicacionId,
                success: function(datos){
					console.log(datos)
					let htmlTable="<table class='table table-bordered table-striped'>";
					htmlTable+="<tr><th>Id</th><th>Comentario</th></tr>"
                    $("#modal_body_comentarios").html("");
                    for(let i=0;i<datos.length;i++){
						htmlTable+=`<tr><td>${datos[i].id}</td><td>${datos[i].comentario}</td></tr>`;
                    }
					htmlTable+="</table>";
                    $("#modal_body_comentarios").append(htmlTable);
                    $("#comentarios_modal").modal();


                }
            })    
        }) 



		
		$(".btn_borrar").click(function(){
			const $tr=$(this).closest("tr");
			const id=$tr.data("id");
			
			Swal.fire({
			  title: '¿Estás seguro que quieres borrar este coche?',
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Borrar',
			  cancelButtonText: 'Cancelar',
			}).then((result) => {
			  if (result.isConfirmed) {	//se pulsó el botón de confirmado
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
				$.ajax({
					method  : "POST",
					url		: "{{url('/coches')}}/"+id,
					data    : {
						_method    : 'DELETE',
						_token  : "{{csrf_token()}}", 
					},
					success : function() {
						$tr.fadeOut()
					} 

				})	  
		  }
			})
					
		});
		
	});

</script>

@endsection