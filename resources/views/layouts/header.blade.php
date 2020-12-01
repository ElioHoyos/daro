<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Negocios y Servicios DARO SAC</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
<link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
<link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
<link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
<link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<style>
  .oculto {
      display: none;
  }
</style>

@php
  use App\categorias;
  $categorias = categorias::all();
@endphp

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="#intro" class="scrollto"><img src="{{asset('img/logo_daro_gif.gif')}}" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Inicio</a></li>
          <li><a href="#about">Nosotros</a></li>
          <li><a href="#services">Catalogos</a></li>
          {{-- <li><a href="#portfolio">Portafolio</a></li> --}}
          <li><a href="#team">Personal</a></li>
          <li class="drop-down"><a href="">Categorias</a>
            <ul>
              @foreach ($categorias as $item)
                <li><a href="categorias/{{$item->id}}">{{$item->nombre}}</a></li>
              @endforeach
              {{-- <li><a href="#">Carpinteria</a></li> --}}
              {{-- <li><a href="#">Corte de Metal</a></li>
              <li><a href="#">Lima y Afiladores</a></li>
              <li><a href="#">Poda y Jardineria</a></li>
              <li><a href="#">Forestal</a></li>
              <li><a href="#">Mecanica Automotriz</a></li> --}}
            </ul>
          </li>

          <li class="drop-down"><a href="#marca">Marcas</a>
            <ul>
              <li><a href="#">BAHCO</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contáctenos</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->


  @yield('content')

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h4>Negocios y Servicios DARO</h4>
            <p>--------------------------</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Enlaces</h4>
            <ul>
              <li><a href="#intro">Inicio</a></li>
              <li><a href="#about">Sobre Nosotros</a></li>
              <li><a href="#services">Catalogos</a></li>
              <li><a href="#team">Personal</a></li>
              <li><a href="#marca">Marca</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Horario de atención</h4>
            <ul>
              <li>Lunes - Viernes</li>
              <ol>
                <ol>8:00am - 1:00pm</ol>
                <ol>3:00pm 6:30pm</ol>
              </ol>
            </ul>
            <ul>
              <li>Sabados</li>
              <ol>
                <ol>8:00am - 1:00pm</ol>
              </ol>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contacto</h4>
            <p>
              <i class="ion-ios-location-outline">Av. Habilitacion urbana municipal Mz.C Lt. 6</i><br>
             Pucallpa - Perú <br>
              <strong>Telefono:</strong> <a href="wa.me/51986135157" target="_blank" title="enviame un mensaje">986 135 157</a> <br>
              <strong>Correo:</strong> oficina.darosac@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter" style="background-color: #00acee"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook" style="background-color: #3b5998"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram" style="background: #f09433; 
              background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); 
              background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
              background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
              filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f09433', endColorstr='#bc1888',GradientType=1 );
                }"><i class="fa fa-instagram"></i></a>
              
            </div>

          </div>

          

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy;  <strong>DARO</strong>. Todos los derechos reservados
      </div>
      
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  

  <!-- JavaScript Libraries -->
  <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('lib/mobile-nav/mobile-nav.js')}}"></script>
  <script src="{{asset('lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('lib/isotope/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{asset('contactform/contactform.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('js/main.js')}}"></script>

  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>

  

</body>
</html>
