  <link  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
  <script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
	body {
		border: 4px solid yellow;
		border-radius: 40px;
		margin: 40px;
		padding: 30px;
        background: rgb(0,212,255);
        background: radial-gradient(circle, rgba(0,212,255,1) 13%, rgba(4,113,190,1) 80%, rgba(9,9,121,1) 97%, rgba(2,0,36,1) 99%);
	}

    table tr:nth-child(1) {
        background-image: linear-gradient( 135deg, #FFAA85 10%, #B3315F 100%) !important;
    }
    
    table tr:nth-child(odd) {
        background-image: linear-gradient( 135deg, #F5CBFF 10%, #C346C2 100%);;
    }
    
    table tr:nth-child(even) {
        background-image: linear-gradient( 135deg, #F6D242 10%, #FF52E5 100%);
    }
    
</style>





<div class="container">
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	@yield("contenido")
</div>



