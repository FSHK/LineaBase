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
        <script src="https://kit.fontawesome.com/72cd9e16a5.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('kiddos/css/open-iconic-bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/animate.css')}}">
        <link href="{{asset('kiddos/css/hover-min.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('kiddos/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/magnific-popup.css')}}">

        <link rel="stylesheet" href="{{asset('kiddos/css/aos.css')}}">

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
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2"><a href="{{route('lines')}}">Administradores <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2"><a href="index.html">Listado <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2"><a href="index.html">Operaciones <i class="ion-ios-arrow-forward"></i></a></span><span> Preguntas</span></p>

          </div>
        </div>
      </div>
    </section>

	<section class="ftco-section ftco-no-pt ftc-no-pb">
		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
          	<br/>
            <h2 class="mb-4"><span>Boleta</span> {{$Boleta->Nombre}}</h2>
          </div>
        </div>
		<div class="container">
			<div class="row">
				<div class="col-md-20 wrap-about py-20 pr-md-20 ftco-animate">
					<h2 class="mb-4">Procesos &amp; Operaciones </h2>
					<div class="row mt-20">
						<div class="bd-example bd-example-tabs">
							<nav>
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
								  <a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Temas &amp; Preguntas </a>
								  <a class="nav-item nav-link" id="nav-boleta-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Listado de Preguntas</a>
								</div>
							</nav>
							<div class="tab-content" id="nav-tabContent">
							<!-- Seccion de Modificar datos de la linea base-->
								<div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<br/>
									<div class="column left">
										<h2 class="mb-4">Agregar Preguntas</h2>
										<form action="{{route('add_question')}}" method="POST">
										  @csrf
							              <div class="form-group">
							                <select name="tema_id" class="form-control">
							                	@foreach($Temas as $T)
							                		<option  value="{{$T->id}}">{{$T->Nombre}}</option>
							                	@endforeach
							                </select>
							              </div>
							              <div class="form-group">
							                <textarea name="Pregunta" id="" cols="30" rows="7" class="form-control" placeholder="Escriba Aca la Pregunta."></textarea required>
							                <input type="text" name="boleta_id" style="display: none;" value="{{$Boleta->id}}">
							              </div>
							              <div class="form-group">
							                <input type="submit" value="Agregar Pregunta" class="btn btn-primary py-3 px-5">
							              </div>
							            </form>
									</div>
									<div class="column center"><p></p></div>
									<div class="column right">
										<h2 class="mb-4">Agregar Temas</h2>
										<form action="{{route('add_topic')}}" method="POST">
										  @csrf
							              <div class="form-group">
							              	<input type="text" name="boleta_id" style="display: none;" value="{{$Boleta->id}}">
							                <input type="text" class="form-control" name="Nombre" placeholder="Nombre del Tema">
							              </div>
							              <div class="form-group">
							                <input type="submit" value="Agregar Tema" class="btn btn-primary py-3 px-5">
							              </div>
							            </form>
									</div>
								</div>
								<!---End Linea Base Update-->
								<!--- Creacion de Boletas --->
								<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-boleta-tab">
									<br/>

									<div class="bd-example bd-example-tabs">
										<nav>
											<div class="nav nav-tabs" id="nav-tab" role="tablist">
												<?php $counter = 0; ?>
												@foreach($Temas as $T)
													<?php $counter++; ?>
													<a class="nav-item nav-link" id="nav-boleta-tab{{$counter}}" data-toggle="tab" href="#nav-profile{{$counter}}" role="tab" aria-controls="nav-profile{{$counter}}" aria-selected="false">Tema #{{$counter}}</a>
												@endforeach
											</div>
										</nav>
										<div class="tab-content" id="nav-tabContent">
											<div class="tab-pane fade active show" id="nav-home2" role="tabpanel" aria-labelledby="nav-home-tab2">

											</div>
											<?php $counter = 0; ?>
											@foreach($Temas as $T)
											<?php $counter++; ?>
											<!--- Creacion de Boletas --->
											<div class="tab-pane fade show" id="nav-profile{{$counter}}" role="tabpanel" aria-labelledby="nav-boleta-tab{{$counter}}">
												<br/>
												<h2 class="mb-4">{{$T->Nombre}}<span>&emsp;<a href="{{route('destroy_topic',[$T->id])}}" class="btn btn-danger option" style="width: 106px;"><i class="fas fa-trash-alt"></i></a></span></h2>
												<br/>
												<table class="table table-borderless table-hover table-responsive">
													<thead>
														<tr class="table-primary">
														<th scope="col" colspan="6" style="text-align: center;">Pregunta</th>
														<th scope="col" colspan="2" style="text-align: center;">Opciones</th>
														</tr>
													</thead>
													@foreach(App\Preguntas::select('Pregunta','id')->where('tema_id','=',$T->id)->get() as $P)
														<tr>
														<th scope="row" colspan="6">{{$P->Pregunta}}</th>
														<td><a href="" class="btn btn-secondary" data-toggle="modal" data-target="#modal-subpreguntas-{{$P->id}}" data-whatever="@mdo">SubPreguntas</td>
														<td><a href="{{route('destroy_question',[$P->id])}}" class="btn btn-danger">Eliminar</td>
														</tr>
													@endforeach
												</table>
											</div>
											<!-- END Creacion de Boletas --->
											@endforeach
										</div>
									</div>
								</div>
								<!-- END Creacion de Boletas --->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@foreach($Temas as $T)
			@foreach(App\Preguntas::where('tema_id','=',$T->id)->get() as $P)
				@include('Administracion.SubPreguntas')
			@endforeach
		@endforeach
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