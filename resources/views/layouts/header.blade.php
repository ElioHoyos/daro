<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Negocios y Servicios DARO SAC</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="">
  <meta content="" name="">

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

  {{-- new --}}
  <link href="{{asset('new/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{asset('new/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{asset('new/css/font-awesome.css')}}" rel="stylesheet">
	<!--pop-up-box-->
	<link href="{{asset('new/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
  <!--//pop-up-box-->
  <!-- flexslider -->
  <link rel="stylesheet" href="{{asset('new/css/flexslider.css')}}" type="text/css" media="screen" />
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="{{asset('new/css/jquery-ui1.css')}}">
	
</head>

<style>
  .oculto {
      display: none;
  }
  table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<script>
  addEventListener("load", function () {
    setTimeout(hideURLbar, 0);
  }, false);

  function hideURLbar() {
    window.scrollTo(0, 1);
  }
</script>

@php
  use App\categorias;
  use App\productos;
  $categorias = categorias::all();
  $productos = productos::all();
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
        <a href="#intro" class="scrollto"><img src="{{asset('images/logo_daro_gif.gif')}}" alt="" class="img-fluid"></a>
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
                <ol>3:00pm - 6:30pm</ol>
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
              <i class="ion-ios-location-outline" style="font-size: 14px">Av. Habilitacion urbana municipal Mz.C Lt. 6</i><br>
              <strong style="font-size: 14px">Telefono:</strong>986 135 157 <br>
              <strong style="font-size: 12px">Correo: oficina.darosac@gmail.com</strong> <br>
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


  {{-- JS --}}
<script src="{{asset('new/js/jquery-2.1.4.min.js')}}"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="{{asset('new/js/jquery.magnific-popup.js')}}"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	<script src="{{asset('new/js/minicart.js')}}"></script>
	<script>
		paypalm.minicartk.render(); //use only unique class names other than paypal1.minicart1.Also Replace same class name in css and minicart.min.js

		paypalm.minicartk.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- price range (top products) -->
	<script src="{{asset('new/js/jquery-ui.js')}}"></script>
	<script>
		//<![CDATA[ 
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>
	<!-- //price range (top products) -->

	<!-- flexisel (for special offers) -->
	<script src="{{asset('new/js/jquery.flexisel.js')}}"></script>
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>
	<!-- //flexisel (for special offers) -->

	<!-- smoothscroll -->
	<script src="{{asset('new/js/SmoothScroll.min.js')}}"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="{{asset('new/js/move-top.js')}}"></script>
	<script src="{{asset('new/js/easing.js')}}"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
  <!-- //end-smooth-scrolling -->
<script src="{{asset('new/js/jquery.flexslider.js')}}"></script>
  <script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="{{asset('new/js/bootstrap.js')}}"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

  

</body>
</html>
