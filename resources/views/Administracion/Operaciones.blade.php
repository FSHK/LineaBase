<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Linea Base FUSALMO-Soyapango</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
        <!-- csrf-token -->
    	<meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset('kiddos/css/open-iconic-bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/animate.css')}}">
        <link href="{{asset('kiddos/css/hover-min.css')}}" rel="stylesheet">
		<script src="{{asset('node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('kiddos/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/aos.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/icomoon.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/style.css')}}">
    </head>
  <body>
    <!-- END nav -->
	    <section class="hero-wrap hero-wrap-2" style="background-image: url('kiddos/images/bg_2.jpg');">
	      <div class="overlay"></div>
	      <div class="container">
	        <div class="row no-gutters slider-text align-items-center justify-content-center">
	          <div class="col-md-9 ftco-animate text-center">
	            <h1 class="mb-2 bread">Modulo Administrador</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2"><a href="{{route('lines')}}">Administradores <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2"><a href="{{route('listado',[$Encuesta->id])}}">Listado de Competencias <i class="ion-ios-arrow-forward"></i></a></span><span> Operaciones</span></p>
	          </div>
	        </div>
	      </div>
	    </section>

		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="row justify-content-center mb-5 pb-2">
	          <div class="col-md-8 text-center heading-section ftco-animate">
	          	<br/>
	            <h2 class="mb-4">{{$Encuesta->Nombre}}</h2>
	          </div>
	        </div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 wrap-about py-10 pr-md-10 ftco-animate">
						<h2 class="mb-4">Procesos &amp; Operaciones </h2>
						<div class="row mt-10">
							<div class="bd-example bd-example-tabs">
								<nav>
									<div class="nav nav-tabs" id="nav-tab" role="tablist">
									  <a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Modificar Datos de Linea</a>
									  <a class="nav-item nav-link" id="nav-boleta-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Boletas</a>
									  <a class="nav-item nav-link" id="nav-data-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Datos Cuantitativos</a>
									</div>
								</nav>
								<div class="tab-content" id="nav-tabContent">
								<!-- Seccion de Modificar datos de la linea base-->
									<div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
										<br/>
										<form action="{{route('modify_survey',[$Encuesta->id])}}" method="POST">
										  @csrf
							              <div class="form-group">
							                <input type="text" name="Nombre" class="form-control" placeholder="Nombre de la Encuesta">
							              </div>
							              <div class="form-group">
							                <textarea name="Descripcion" cols="30" rows="7" class="form-control" placeholder="Descripcion de la Encuesta"></textarea>
							              </div>
							              <div class="form-group">
							                <input type="submit" value="Actualizar Datos" class="btn btn-primary py-3 px-5">
							              </div>
							            </form>
									</div>
									<!---End Linea Base Update-->
									<!--- Creacion de Boletas --->
									<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-boleta-tab">
										@if (count($Boletas) == 0)
											<br/>
											<button class="btn btn-info" onclick="return theFunction();">Crear Boleta</button>
										    <p></p>
											<h3 class="mb-4">No hay ninguna boleta </h3>
										@else
										<br/>
										<button class="btn btn-info" onclick="return theFunction();">Crear Boleta</button>
									<br/>
									<br/>
									<table id="Tabla_de_Boletas" class="table table-borderless table-hover table-responsive">
									  <thead>
									    <tr class="table-primary">
									      <th scope="col" style="text-align: center;">Nombre de Boleta</th>
									      <th scope="col" style="text-align: center;">Area</th>
									      <th scope="col" style="text-align: center;">Cantidad de Temas</th>
									      <th scope="col" style="text-align: center;">Cantidad de Preguntas</th>
									      <th scope="col" colspan="4" style="text-align: center;">Opciones</th>
									    </tr>
									  </thead>
									  <tbody>
									  	@foreach($Boletas as $B)
									  	 <tr>
									      <th scope="row">{{$B->Nombre}}</th>
									      <th scope="row">{{$B->id}}</th>
									      <th scope="row" style="text-align: center;"7>
										      	@php
												 	// Parametros de la conexion
													$servername = 'localhost';
													$database= 'linea_base';
													$username = 'root';
													$password = '';
													// Fin Parametros
													try {
														//Ejecutando la conexion
														$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
														$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
														$stmt = $conn->prepare("SELECT COUNT(temas.Nombre) FROM temas WHERE temas.boleta_id ={$B->id}");
														$stmt->execute();
														$Qty = $stmt->fetch(PDO::FETCH_ASSOC);
														$string=implode(",",$Qty);
														echo $string;
														$conn = null;
													}
													catch(PDOException $e)
													{
														echo "Eror de Conexion: " . $e->getMessage();
													}
												@endphp
										  </th>
									      <th scope="row" style="text-align: center;"7>
										      	@php
													$servername = 'localhost';
													$database= 'linea_base';
													$username = 'root';
													$password = '';
													try {
														$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
														$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
														$stmt = $conn->prepare("SELECT COUNT(preguntas.Pregunta) FROM preguntas WHERE preguntas.boleta_id ={$B->id}");
														$stmt->execute();
														$Qty = $stmt->fetch(PDO::FETCH_ASSOC);
														$string=implode(",",$Qty);
														echo $string;
														$conn = null;
													}
													catch(PDOException $e)
													{
														echo "Eror de Conexion: " . $e->getMessage();
													}
												@endphp
									      </th>
									      <td><a href="{{route('preguntas',[$B->id])}}" class="btn btn-secondary">Preguntas</td>
									      <td><a href="{{route('resultados',[$B->id])}}" class="btn btn-success">Resultados</td>
									      <td><a href="#" class="btn btn-info">Datos Fusalmo</td>
									      <td><a href="#" class="btn btn-danger">Eliminar</td>
									     </tr>
									  	@endforeach
									  </tbody>
									</table>
									@endif
									<script type="text/javascript">
									    async function theFunction () {
											//----- Input de los datos -----------
											const { value: formValues } = await Swal.fire({
											  title: 'Nueva Boleta',
											  html:
											    '<input id="swal-input1" class="swal2-input" placeholder = "Nombre de la Boleta">' +
											    '<input id="swal-input2" class="swal2-input" placeholder = "Descripción de la Boleta (Opcional)">',
											  focusConfirm: false,
											  howCancelButton: true,
											  preConfirm: () => {
											    return [
											      document.getElementById('swal-input1').value,
											      document.getElementById('swal-input2').value
											    ]
											  }
											})
											if (formValues)
											{
												var myObj = JSON.parse(JSON.stringify(formValues));
											  	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
											  	if(myObj[0] !="")
											  	{
											  		$.ajax({
											          type: "POST",
											          url: '{{route('create_ticket')}}',
											          data: {
									                    	_token: CSRF_TOKEN,
									                    	Nombre : myObj[0],
									                    	Encuesta_Id : {{$Encuesta->id}},
									                    	Descripcion : myObj[1]
									                    },
											          success: function(response)
											          {
											          	if(response.code=='500')
											          	{
											          		Swal.fire({
												  			icon: 'success',
												  			title: 'Gracias',
												  			text: 'Boleta creada con exito!',
												  			timer: 2000,
												  			timerProgressBar: true,
												  			showConfirmButton: false
												  			})
												  			location.reload();
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
											  	else{
											  		Swal.fire({
										  			icon: 'error',
										  			title: 'Oops...',
										  			text: 'Debes ingresar un nombre para la boleta.',
										  			timer: 2000,
										  			timerProgressBar: true,
										  			showConfirmButton: false
										  			})
											  	}
								            }
								        }
									</script>
									</div>
									<!-- END Creacion de Boletas --->
									<!-- Datos cuantitativos--->
									<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-data-tab">
										<p>Sint sit mollit irure quis est nostrud cillum consequat Lorem esse do quis dolor esse fugiat sunt do. Eu ex commodo veniam Lorem aliquip laborum occaecat qui Lorem esse mollit dolore anim cupidatat. Deserunt officia id Lorem nostrud aute id commodo elit eiusmod enim irure amet eiusmod qui reprehenderit nostrud tempor. Fugiat ipsum excepteur in aliqua non et quis aliquip ad irure in labore cillum elit enim. Consequat aliquip incididunt ipsum et minim laborum laborum laborum et cillum labore. Deserunt adipisicing cillum id nulla minim nostrud labore eiusmod et amet. Laboris consequat consequat commodo non ut non aliquip reprehenderit nulla anim occaecat. Sunt sit ullamco reprehenderit irure ea ullamco Lorem aute nostrud magna.</p>
									</div>
									<!--- END Datos cuantitativos --->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-10 text-center">
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