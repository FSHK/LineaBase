<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Linea Base FUSALMO-Soyapango</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('kiddos/css/open-iconic-bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/animate.css')}}">
        <link href="{{asset('kiddos/css/hover-min.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('kiddos/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/magnific-popup.css')}}">

        <link rel="stylesheet" href="{{asset('kiddos/css/aos.css')}}">

        <script src="{{asset('js/highcharts.js')}}"></script>
		<script src="{{asset('js/highcharts-more.js')}}"></script>
		<script src="{{asset('js/modules/exporting.js')}}"></script>
		<script src="{{asset('js/modules/export-data.js')}}"></script>
		<script src="{{asset('js/modules/accessibility.js')}}"></script>

        <link rel="stylesheet" href="{{asset('kiddos/css/ionicons.min.css')}}">

        <link rel="stylesheet" href="{{asset('kiddos/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/icomoon.css')}}">
        <link rel="stylesheet" href="{{asset('kiddos/css/style.css')}}">
        <script type="text/javascript">
			Highcharts.setOptions({
			    lang: {
			    	viewFullscreen: 'Ver en Pantalla Completa',
			    	printChart: 'Imprimir Grafico',
			    	downloadCSV: 'Descargar CSV',
			    	downloadJPEG: 'Descargar JPEG',
			    	downloadPDF: 'Convertir a PDF',
			    	downloadPNG: 'Descargar en PNG',
			    	downloadSVG: 'Descargar en SVG',
			    	downloadXLS: 'Descargar en XLS',
			    	viewData: 'Ver Datos en Tabla',
			    	openInCloud: 'Abrir en la Interfaz de HighCharts',
			        months: [
			            'Enero', 'Febrero', 'Marzo', 'Abril',
			            'Mayo', 'Junio', 'Julio', 'Agosto',
			            'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
			        ],
			        weekdays: [
			            'Domingo', 'Lunes', 'Martes', 'Miercoles',
			            'Jueves', 'Viernes', 'Sabado'
			        ]
			    }
			});
		</script>

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
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2"><a href="{{route('lines')}}">Administradores <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2"><a href="index.html">Listado <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2"><a href="index.html">Operaciones <i class="ion-ios-arrow-forward"></i></a></span><span> Resultados</span></p>
          </div>
        </div>
      </div>
    </section>
	<section class="ftco-section ftco-no-pt ftc-no-pb">
		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
          	<br/>
            <h2 class="mb-4"><span>Encuestas</span> {{$Boleta->Nombre}}</h2>
            <p>24 Entrevistados</p>
          </div>
        </div>
		<div class="container">
			<div class="row">
				<div class="col-md-20 wrap-about py-20 pr-md-20 ftco-animate">
					<h2 class="mb-4">Resultados de la Encuesta</h2>
					<div class="row mt-20">
						<table class="table table-borderless table-hover table-responsive">
						  <thead>
						    <tr class="table-primary">
						      <th scope="col" colspan="5" style="text-align: center;">Tema</th>
						      <th scope="col" style="text-align: center;">Media</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@foreach($Temas as $T)
						  	<tr>
						      <th scope="row" colspan="5">{{$T->Nombre}}</th>
						      <td><a href="#" class="btn btn-success">{{round(App\Transacciones::Where('tema_id','=',$T->id)->pluck('valoracion')->avg(), 2)}}</td>
						    </tr>
						  	@endforeach
						  </tbody>
						</table>
						<br/>
					</div>
				</div>
				<div class="col-md-20 wrap-about py-20 pr-md-20 ftco-animate" id="container" style="width:100%; height:400px;"></div>
				<script type="text/javascript">
					Highcharts.chart('container', {
					    chart: {
					        polar: true,
					        type: 'line'
					    },

					    title: {
					        text: 'Ideal vs Promedio vs Minimo',
					        x: -80
					    },

					    pane: {
					        size: '90%'
					    },

					    xAxis: {
					        categories: [@foreach($Temas as $T)
									     '{{$T->Nombre}}',
									     @endforeach],
					        tickmarkPlacement: 'on',
					        lineWidth: 0,
					        labels: {
						      style: {
						        //color: '#000',
						        //font: '20px Trebuchet MS, Verdana, sans-serif'
						      }
						    },
					    },
					    yAxis: {
					        gridLineInterpolation: 'polygon',
					        lineWidth: 0,
					        min: 0
					    },

					    tooltip: {
					        shared: true,
					        pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y}</b></span><br/>'


					    },

					    legend: {
					    	itemStyle: {
					            font: '10pt Trebuchet MS, Verdana, sans-serif',
					            color: 'black'
					        },
					        align: 'right',
					        verticalAlign: 'middle',
					        layout: 'vertical',
					    },

					    series: [{
					        name: 'Ideal',
					        data: [@foreach($Temas as $T)
					        		6,
					        	   @endforeach],
					        pointPlacement: 'on'
					    }, {
					        name: 'Promedio',
					        data: [@foreach($Temas as $T)
					        		{{round(App\Transacciones::Where('tema_id','=',$T->id)->pluck('valoracion')->avg(), 2)}},
					        	   @endforeach],
					        pointPlacement: 'on'
					    },{
					        name: 'Minimo',
					        data: [@foreach($Temas as $T)
					        		2,
					        	   @endforeach],
					        pointPlacement: 'on'
					    }],

					    responsive: {
					        rules: [{
					            condition: {
					                maxWidth: 500
					            },
					            chartOptions: {
					                legend: {
					                    align: 'center',
					                    verticalAlign: 'bottom',
					                    layout: 'horizontal'
					                },
					                pane: {
					                    size: '100%'
					                }
					            }
					        }]
					    }
					});
				</script>
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
	<div id="ftco-loader" class="show fullscreen">
		<svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
  		</svg>
  	</div>

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