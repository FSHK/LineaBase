<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Linea Base FUSALMO-Soyapango</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  		<!-- csrf-token -->
    	<meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('kiddos/css/open-iconic-bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/animate.css')}}">
        <link href="{{asset('kiddos/css/hover-min.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('kiddos/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/magnific-popup.css')}}">

        <link rel="stylesheet" href="{{asset('kiddos/css/aos.css')}}">
        <script src="{{asset('node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

        <link rel="stylesheet" href="{{asset('kiddos/css/ionicons.min.css')}}">

        <link rel="stylesheet" href="{{asset('kiddos/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/icomoon.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/style.css')}}">
    </head>
  <body>


	<section class="hero-wrap hero-wrap-2" style="background-image: url('kiddos/images/bg_2.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">Modulo Administrador</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2"><a href="{{route('lines')}}">Administradores <i class="ion-ios-arrow-forward"></i></a></span> <span> Listado de Encuestas</span></p>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section ftco-no-pt ftc-no-pb">
		<div class="container">
			<div class="row">
				<div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
					<div class="text px-4 ftco-animate">
          				<h2 class="mb-4">Procesos &amp; Operaciones</h2>
						<p>Por motivos de eficiencia y productividad se han simplificado las funciones que los educadores hacen.<br/>Para facilitar la curva de aprendizaje se han simplificado en las siguientes. Cada funcion o proceso como prefiera llamarse tiene una breve explicacion acerca del funcionamiento que posee.<br/>Sin mas que decir, me despido.</p>
						<button onclick="Add_Line()" class="btn test" style="background-color: #00A5D0; color: white;">Agregar Linea Base</button>
					</div>
				</div>
				<div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
					<h2 class="mb-4">Procesos &amp; Operaciones </h2>
					<div class="row mt-5">
						<table class="table table-borderless table-hover table-responsive">
						  <thead>
						    <tr class="table-primary">
						      <th scope="col">Nombre de Encuesta</th>
						      <th scope="col">Año</th>
						      <th scope="col" colspan="2" style="text-align: center;">Opciones</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@foreach($Encuestas as $P)
							  	<tr>
							      <th scope="row">{{$P->Nombre}}</th>
							      <td>{{$P->Año}}</td>
							      <td><a href="{{route('operaciones_linea',[$P->id])}}" style="background-color: #92d481; color: white;" class="btn">Competencias</td>
							      <td><a onclick="Delete(this.id)" id="{{$P->id}}" style="background-color: #ff4545; color: white;" class="btn">Eliminar</td>
							    </tr>
						  	@endforeach
						  	<script type="text/javascript">
						  		async function Delete(clicked_id)
							  	{
							  		Swal.fire({
							  			title: 'Seguro que deseas borrar el registro?',
							  			text: "No podras deshacer esta accion!",
							  			icon: 'warning',
							  			showCancelButton: true,
							  			confirmButtonColor: '#3085d6',
							  			cancelButtonColor: '#d33',
							  			confirmButtonText: 'Si, borralo!'
							  		}).then((result) => {
							  			if (result.value) {
							  				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
								                $.ajax({
											          type: "POST",
											          url: '{{route('delete')}}',
											          data: {
									                    	_token: CSRF_TOKEN,
									                    	id : clicked_id,
									                    },
											          success: function(response)
											          {
											          	if(response.code=='500')
												          	{
												          		Swal.fire({
													  			icon: 'success',
													  			title: 'Eliminado!',
													  			text: 'Toda la informacion de la encuesta ha sido borrada!',
													  			timer: 3000,
													  			timerProgressBar: true,
													  			showConfirmButton: false
													  			})
												          	}
											          	else
												          	{
												          	  Swal.fire({
													  			icon: 'error',
													  			title: 'Oops...',
													  			text: 'Hubo un error, pide ayuda a soporte.',
													  			timer: 1900,
													  			timerProgressBar: true,
													  			showConfirmButton: false
													  			})
													  			$('button[class="btn test"]').prop('disabled', true);
												          	}
											          	window.location.href = '{{ route('lines')}}';
											          }
											        });
								            }
								        })
							  	}
						  	</script>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
    <footer class="ftco-footer ftco-bg-dark ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
				<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>

	  <!-- loader -->
	  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

		<script type="text/javascript">
		    async function Add_Line() {
				//----- Input de los datos -----------
				const { value: formValues } = await Swal.fire({
				  title: 'Formulario de Encuesta',
				  html:
				    '<input id="swal-input1" class="swal2-input" placeholder = "Nombre de la Encuesta">' +
				    '<input id="swal-input2" class="swal2-input" placeholder = "Descripción de la Encuesta">',
				  focusConfirm: false,
				  howCancelButton: true,
				  preConfirm: () => {
				    return [
				      document.getElementById('swal-input1').value,
				      document.getElementById('swal-input2').value
				    ]
				  }
				})
				if (formValues) {
					var myObj = JSON.parse(JSON.stringify(formValues));
				  	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
				                $.ajax({
							          type: "POST",
							          url: '{{route('create_line')}}',
							          data: {
					                    	_token: CSRF_TOKEN,
					                    	Nombre : myObj[0],
					                    	Descripcion : myObj[1]
					                    },
							          success: function(response)
							          {
							          	if(response.code=='500')
							          	{
							          		Swal.fire({
								  			icon: 'success',
								  			title: 'Gracias',
								  			text: 'Encuesta creada con exito!',
								  			timer: 2000,
								  			timerProgressBar: true,
								  			showConfirmButton: false
								  			})
								  			window.location.href = '{{ route('lines')}}';
							          	}
							          	else
							          	{
							          	  Swal.fire({
								  			icon: 'error',
								  			title: 'Oops...',
								  			text: 'Hubo un error al guardar la informacion.',
								  			timer: 2000,
								  			timerProgressBar: true,
								  			showConfirmButton: false
								  			})
							          	}

							          }
							        });
				}
		    }
		</script>
		<script src="{{asset('kiddos/js/jquery.min.js')}}"></script>
		<script src="{{asset('kiddos/js/jquery-migrate-3.0.1.min.js')}}"></script>
		<script src="{{asset('kiddos/js/popper.min.js')}}"></script>
		<script src="{{asset('kiddos/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('kiddos/js/jquery.easing.1.3.js')}}"></script>
		<script src="{{asset('kiddos/js/jquery.waypoints.min.js')}}"></script>
		<script src="{{asset('kiddos/js/jquery.stellar.min.js')}}"></script>
		<script src="{{asset('kiddos/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('kiddos/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('kiddos/js/aos.js')}}"></script>
		<script src="{{asset('kiddos/js/jquery.animateNumber.min.js')}}"></script>
		<script src="{{asset('kiddos/js/scrollax.min.js')}}"></script>
		<script src="{{asset('kiddos/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false')}}"></script>
		<script src="{{asset('kiddos/js/google-map.js')}}"></script>
		<script src="{{asset('kiddos/js/main.js')}}"></script>
  </body>
</html>