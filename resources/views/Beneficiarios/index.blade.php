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
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2"><a href="index.html">Administradores <i class="ion-ios-arrow-forward"></i></a></span> <span> Listado de Encuestas</span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <span class="subheading">FUSALMO</span>
            <h2 class="mb-4"><span>Bienvenido </span> {{ Auth::user()->NombreUsuario}}</h2>
            <p>En este listado podras observar todas las encuentas que necesitamos que contestes porfavor.</p>
            <p>Cualquier duda o pregunta no dudes en mencionarselo a tu docente encargado.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
        @isset($Flag)
            @if($Flag)
                <script>
                     Swal.fire({
                        icon: 'success',
                        title: 'Encuesta Completada!',
                        text: 'Gracias por tu tiempo, si posees encuestas pendientes por favor realizarlas.Muchas Gracias FUSALMO!',
                        timer: 5000,
                        timerProgressBar: true,
                        showConfirmButton: false
                        });
                </script>
                @else
                <script>
                     Swal.fire({
                        icon: 'error',
                        title: 'Boleta Invalida!',
                        text: 'No tienes derecho ha accerder a esta boleta, si es un error porfavor contacta al docente.!',
                        timer: 5000,
                        timerProgressBar: true,
                        showConfirmButton: false
                        });
                </script>
            @endif
        @endisset

        <div class="container">
            <div class="row">
            @if($Boletas->count() == 0)
            <script>
                     Swal.fire({
                        icon: 'success',
                        title: 'Felicitaciones!',
                        text: 'Gracias por haber completado todas las encuestas.Muchas Gracias FUSALMO!',
                        timer: 5000,
                        timerProgressBar: true,
                        showConfirmButton: false
                        });
                </script>
            @endempty
            @foreach($Boletas as $B)
            <div class="col-md-6 col-lg-3 ftco-animate">
                @foreach(App\Boleta::where('id','=',$B->boleta_id)->get() as $P)
                <div class="pricing-entry bg-light pb-4 text-center">
                    <div>
                        <h3 class="mb-3">{{$P->Nombre}}</h3>
                    </div>
                    <div class="img" style="background-image: url(kiddos/images/bg_1.jpg);"></div>
                    <div class="px-4">
                        <p>{{$P->Descripcion}}</p>
                    </div>
                    <p class="button text-center"><a href="{{route('encuesta',[$P->id])}}" class="btn btn-primary px-4 py-3">Realizar Encuesta</a></p>
                </div>
                @endforeach
            </div>
            @endforeach

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
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
        </svg>
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
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
