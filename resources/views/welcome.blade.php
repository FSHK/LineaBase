<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Fusalmo</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- css -->
<link href="{{asset('smart-kids/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{asset('smart-kids/css/fancybox/jquery.fancybox.css')}}" rel="stylesheet">
<link href="{{asset('smart-kids/css/jcarousel.css')}}" rel="stylesheet" />
<link href="{{asset('smart-kids/css/flexslider.css')}}" rel="stylesheet" />
<link href="{{asset('smart-kids/js/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<link href="{{asset('smart-kids/css/style.css')}}" rel="stylesheet" />
<script src="{{asset('node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<style type="text/css">
 .swal2-popup {
          font-size: 1.6rem !important;
        }
</style>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
    <section id="featured">
    <!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="{{asset('smart-kids/img/slides/1.jpg')}}" alt="" width="1000" height="850"  />
                <div class="flex-caption">
                   <div class="item_introtext">
                    <strong>Your Kids Buddy </strong>
                    <p>The best educational template</p> </div>
                </div>
              </li>
              <li>
                <img src="{{asset('smart-kids/img/slides/2.jpg')}}" alt="" width="1000" height="850"  />
                <div class="flex-caption">
                     <div class="item_introtext">
                    <strong>All-round Growth</strong>
                    <p>Get all courses with on-line content</p> </div>
                </div>
              </li>
              <li>
                <img src="{{asset('smart-kids/img/slides/3.jpg')}}" alt=""  width="1000" height="850" />
                <div class="flex-caption">
                     <div class="item_introtext">
                    <strong>Balanced Schooling</strong>
                    <p>Awesome Template get it know</p> </div>
                </div>
              </li>
            </ul>
        </div>
    <!-- end slider -->

    </section>
    <section class="hero-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="aligncenter"><h1 class="aligncenter">
Fusalmo</h1><span class="clear spacer_responsive_hide_mobile " style="height:13px;display:block;"></span>Fundada en el 2001, que por medio de procesos educativos integrales desarrollamos Programas y Proyectos flexibles que responden a las necesidades de la niñez, adolescencia y juventud de zonas de mayor población y vulnerabilidad.</div>
            </div>
        </div>
    </div>
    </section>
    <section id="content">


    <div class="container">
      <div class="row">
        @auth
        <div class="skill-home">
          <div class="skill-home-solid clearfix">
            <div class="col-md-3 text-center"><a href="{{route('beneficiarios')}}">
              <span class="icons c1"><i class="fa fa-trophy"></i></span></a>
              <div class="box-area">
                <h3>Beneficiarios</h3> <p>Si eres un beneficiario de alguno de los programas de fusalmo, haz clic aca.</p>
              </div>
            </div>
            <div class="col-md-3 text-center"><a href="{{route('lines')}}">
              <span class="icons c3"><i class="fa fa-desktop"></i></span></a>
              <div class="box-area">
                <h3>Administradores</h3><p>Acceso autorizado unicamente para personal administrativo de fusalmo.</p>
              </div>
            </div>
          </div>
        </div>
        @endauth
        @guest
        <div class="skill-home">
          <div class="skill-home-solid clearfix">
            <div class="col-md-3 text-center"><a href="#" onclick="Login()">
              <span class="icons c1"><i class="fa fa-trophy"></i></span></a>
              <div class="box-area">
                <h3>Beneficiarios</h3> <p>Si eres un beneficiario de alguno de los programas de fusalmo, haz clic aca.</p>
              </div>
            </div>
            <div class="col-md-3 text-center"><a href="#" onclick="Login()">
              <span class="icons c3"><i class="fa fa-desktop"></i></span></a>
              <div class="box-area">
                <h3>Administradores</h3><p>Acceso autorizado unicamente para personal administrativo de fusalmo.</p>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
            async function Login()
            {
                const { value: formValues } = await Swal.fire({
                  title: 'Ingresar al Sistema',
                  imageUrl: '{{asset('smart-kids/img/slides/login.png')}}',
                  imageWidth: 600,
                  imageHeight: 400,
                  html:
                    '<input id="swal-input1" class="swal2-input" name="email" placeholder="Usuario">' +
                    '<input type="password" id="swal-input2" class="swal2-input" name="password" placeholder="Contraseña">',
                  focusConfirm: false,
                  preConfirm: () => {
                    return [
                      document.getElementById('swal-input1').value,
                      document.getElementById('swal-input2').value
                    ]
                  }
                })

                if (formValues) {
                  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                  var myObj = JSON.parse(JSON.stringify(formValues));
                  $.ajax({
                    type: "POST",
                    url: '{{route('login')}}',
                    data: {
                      _token: CSRF_TOKEN,
                      email : myObj[0],
                      password : myObj[1]
                    },
                    success: function(response)
                    {

                    }
                  });
                }
            }
        </script>
        @endguest
        </div>
    </div>
    </section>


    <footer>

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright">
                        <p>
                            <span>&copy; Smart Kids Site All right reserved. Template By </span><a href="http://webthemez.com" target="_blank">WebThemez</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('smart-kids/js/jquery.js')}}"></script>
<script src="{{asset('smart-kids/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('smart-kids/js/bootstrap.min.js')}}"></script>
<script src="{{asset('smart-kids/js/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('smart-kids/js/jquery.fancybox-media.js')}}"></script>
<script src="{{asset('smart-kids/js/Gallery/jquery.quicksand.js')}}"></script>
<script src="{{asset('smart-kids/js/Gallery/setting.js')}}"></script>
<script src="{{asset('smart-kids/js/jquery.flexslider.js')}}"></script>
<script src="{{asset('smart-kids/js/animate.js')}}"></script>
<script src="{{asset('smart-kids/js/custom.js')}}"></script>
<script src="{{asset('smart-kids/js/owl-carousel/owl.carousel.js')}}"></script>
</body>
</html>