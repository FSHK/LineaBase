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
        <style type="text/css">
        	.column {
			  float: left;
			}

			.left {
			  width: 47.5%;
			}

			.center {
			  width: 5%;
			}

			.right {
			  width: 47.5%;
			}

			.header {
			  width: 65%;
			}

			.option {
			  width: 35%;
			}
        </style>
    </head>

  <body>


     <section class="hero-wrap hero-wrap-2" style="background-image: url('kiddos/images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Modulo Administrador</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2"><a href="index.html">Administradores <i class="ion-ios-arrow-forward"></i></a></span> <span> Listado de Encuestas</span></p>

          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row">
					<!--- Creacion de Boletas --->
						<div class="col-md-20 wrap-about py-10 pr-md-20 ftco-animate">
							<br/>
								<h2 class="mb-4">Tecnología Educativa</h2>
							<br/>
							<table class="table table-borderless table-hover table-responsive">
							  <thead>
							    <tr class="table-primary">
							      <th scope="col" style="text-align: center;">Pregunta</th>
							      <th scope="col" colspan="5" style="text-align: center;">Opciones</th>
							    </tr>
							  </thead>
							  <tbody>

								    <tr>
								      <th scope="row">{{$Preguntas->Pregunta}}</th>
								      <td><button onclick="Example(this.id)" class="btn test" id="5" style="background-color: #00A5D0; color: white;">Siempre</button></td>
								      <td><button onclick="Positives(this.id)" class="btn test" id="4" style="background-color: #00d0c6; color: white;">Casi Siempre</td>
								      <td><button onclick="Positives(this.id)" class="btn test" id="3" style="background-color: #00d068; color: white;">A Veces</td>
								      <td><button onclick="Negatives(this.id)" class="btn test" id="2" style="background-color: #ffa70f; color: white;">Poco</td>
								      <td><button onclick="Negatives(this.id)" class="btn test" id="1" style="background-color: #ff0f0f; color: white;">Nunca</td>
								    </tr>
								  <script type="text/javascript">
								  	async function Positives(clicked_id)
								  	{
								  		const { value: fruit } = await Swal.fire({
								  			title: '{{$Sub1->Nombre}}Posi',
								  			input: 'select',
								  			inputOptions: {
								  				@foreach($Opciones1 as $OP)
								  					{{$OP->id}}: '{{$OP->Nombre}}',
								  				@endforeach},
								  				inputPlaceholder: 'Seleccione una respuesta',
								  				showCancelButton: true
								  			})
								  		if (fruit) {
								  			Swal.fire({
								  			icon: 'success',
								  			title: 'Gracias',
								  			text: 'Tu Respuesta ha sido guardad con exito!',
								  			timer: 1900,
								  			timerProgressBar: true,
								  			showConfirmButton: false
								  			})
								  			$('button[class="btn test"]').prop('disabled', true);
								  		}}
							      </script>
							      <script type="text/javascript">
							      	async function Negatives(clicked_id)
							      	{
							      		//alert(clicked_id);
							      		const { value: fruit } = await Swal.fire({
							      			title: '{{$Sub2->Nombre}}',
							      			input: 'select',
							      			inputOptions: {
							      				@foreach($Opciones2 as $OP)
							      					{{$OP->id}}: '{{$OP->Nombre}}',
							      				@endforeach},
							      			inputPlaceholder: 'Seleccione una respuesta',
							      			showCancelButton: true})
							      		if (fruit) {Swal.fire({
							      			icon: 'success',
							      			title: 'Gracias',
							      			text: 'Tu Respuesta ha sido guardad con exito!',
							      			timer: 2000,
							      			timerProgressBar: true,})
							      			$('button[id="Test"]').prop('disabled', true);

							      		}}
							      </script>

							      <script type="text/javascript">
							      	async function Example(clicked_id)
							      	{							      		//alert(clicked_id);
							      		const { value: fruit } = await Swal.fire({
							      			title: '{{$Sub2->Nombre}}Posi',
							      			input: 'select',
							      			inputOptions: {
							      				@foreach($Opciones2 as $OP)
							      					{{$OP->id}}: '{{$OP->Nombre}}',
							      				@endforeach},
							      			inputPlaceholder: 'Seleccione una respuesta',
							      			showCancelButton: true})
							      		if (fruit) {
							      			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
									                $.ajax({
												          type: "POST",
												          url: '{{route('next')}}',
												          data: {
										                    	_token: CSRF_TOKEN,
										                    	score : clicked_id,
										                    	pregunta : {{$Preguntas->id}}
										                    },
												          success: function(response)
												          {
												          	if(response.code=='500')
												          	{
													  			$('button[class="btn test"]').prop('disabled', true);
													          	window.location.href = '{{ route('next_question', $Preguntas->id) }}';
												          	}
												          	else
												          	{

												          	  Swal.fire({
													  			icon: 'success',
													  			title: 'Muchas Gracias',
													  			text: 'Felicidades has completado la encuesta.',
													  			timer: 2000,
													  			timerProgressBar: true,
													  			showConfirmButton: false
													  			})
													  			$('button[class="btn test"]').prop('disabled', true);
												          	}
												          }
												        });
									            }}
							      </script>
							  </tbody>
							  <caption>Pregunta 1 de {{$PluckData->count()}}</caption>
							</table>
							<br/>
						</div>
						<!-- END Creacion de Boletas --->
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