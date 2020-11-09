<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Colegio Sollertia</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" rel="stylesheet" href="{{ asset('css/style.css') }}">
	<!-- Template specific stylesheets-->
	{{-- <link href="assets/lib/loaders.css/loaders.min.css" rel="stylesheet"> --}}
	{{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Open+Sans:300,400,600,700,800" rel="stylesheet"> --}}
	{{-- <link href="assets/lib/iconsmind/iconsmind.css" rel="stylesheet"> --}}
	{{-- <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet"> --}}
	{{-- <link href="assets/lib/hamburgers/dist/hamburgers.min.css" rel="stylesheet"> --}}
	{{-- <link href="assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet"> --}}
	{{-- <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet"> --}}
	{{-- <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet"> --}}
	{{-- <link href="assets/lib/remodal/dist/remodal.css" rel="stylesheet"> --}}
	{{-- <link href="assets/lib/remodal/dist/remodal-default-theme.css" rel="stylesheet"> --}}
	{{-- <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet"> --}}
	{{-- <link href="assets/lib/lightbox2/dist/css/lightbox.css" rel="stylesheet"> --}}
	<!-- Main stylesheet and color file-->
	<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
</head>
<style>
	.dropdown li a 
	{
		color: white !important;
	}
	.navbar-light .navbar-nav .nav-link 
	{
		color: white;
	}
	.navbar-light .navbar-nav .active>.nav-link  {
		color: white;
	}
	.bg-azul{
		background-color: #0066b2!important;
	
	}
	.blanco
	{
		color: white;!important;
		font-weight: bold;
	}
	.negro
	{
		color: black;
		font-weight: bold;
	}
	.centrarcontenido
	{
		justify-content: center;!important
	}
	.item {
      display: block;
      width: 100%;
      height: 300px;
	  background-position: center;
      background-repeat: non-repeat;
      background-size: cover;
	}
	.item img {
		height: 100%;
		width: 100%;
	}
	.textoabajo
	{
		vertical-align: text-bottom;
	}
</style>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-azul">
		<a class="navbar-brand" href="#"><img src="/images/logo1.png" height="40" alt=""></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
			<li class="nav-item" >
				<a class="nav-link blanco" href="#">Secretaria</a>
			</li>
			<li class="nav-item">
				<a class="nav-link blanco" href="#">Contactanos</a>
			</li>
			<li class="nav-item dropdown ">
				<a class="nav-link dropdown-toggle blanco" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Sollertia In
				</a>
				<div class="dropdown-menu bg-azul" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="login">Intranet</a>
				<a class="dropdown-item" target="_blank" href="https://wa.me/51949947194">Manual</a>
				{{-- <a class="dropdown-item" href="#">Something else here</a> --}}
				</div>
			</li>
			</ul>
		</div>
	</nav>
	<br>
	
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-sm-12  col-md-12">
				<div id="demo" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ul class="carousel-indicators">
					  <li data-target="#demo" data-slide-to="0" class="active"></li>
					  <li data-target="#demo" data-slide-to="1"></li>
					  <li data-target="#demo" data-slide-to="2"></li>
					</ul>
				  
					<!-- The slideshow -->
					<div class="carousel-inner">
					  <div class="carousel-item active">
						<img src="images/fondo1.jpg" alt="Los Angeles">
					  </div>
					  <div class="carousel-item">
						<img src="images/fondo2.jpg" alt="Chicago">
					  </div>
					  {{-- <div class="carousel-item">
						<img src="ny.jpg" alt="New York">
					  </div> --}}
					</div>
				  
					<!-- Left and right controls -->
					<a class="carousel-control-prev" href="#demo" data-slide="prev">
					  <span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="#demo" data-slide="next">
					  <span class="carousel-control-next-icon"></span>
					</a>
				  
				</div> 
			</div>
		</div>
		<br><br>
		<hr class="bg-success">
		<div class="row justify-content-center">
			<div class="row mb-6">
				<div class="col">
					<h3 class="fs-2 fs-md-3">Nuestros servicios</h3>
					<hr class="short" data-zanim="{&quot;from&quot;:{&quot;opacity&quot;:0,&quot;width&quot;:0},&quot;to&quot;:{&quot;opacity&quot;:1,&quot;width&quot;:&quot;4.20873rem&quot;},&quot;duration&quot;:0.8}" style="width: 4.20873rem; opacity: 1;">
				</div>
			</div>
			<div class="col-md-12">
				<div class="card-deck">
					<div class="card">
					  <img class="card-img-top" src="images/aprendo.jpg" alt="Card image cap">
					  <div class="card-body">
						<h5 class="card-title negro">Aprendo en casa</h5>
						<p class="card-text text-justify">Aprendo en casa ofrece experiencias de aprendizaje, herramientas y recursos educativos orientados a favorecer los aprendizajes.</p>
						<p class="card-text textoabajo"><small class="text-muted">Actualizado hoy</small></p>
					  </div>
					</div>
					<div class="card">
					  <img class="card-img-top" src="images/alumnos1.jpg" alt="Card image cap">
					  <div class="card-body">
						<h5 class="card-title negro">Formación en valores</h5>
						<p class="card-text text-justify">Nuestro método de enseñanza, se basa en valores y conocimientos</p>
						<p class="card-text textoabajo"><small class="text-muted">Actualizado hoy</small></p>
					  </div>
					  
					</div>
					<div class="card">
					  <img class="card-img-top" src="images/card3.jpg" alt="Card image cap">
					  <div class="card-body">
						<h5 class="card-title negro">Matricula Abierta</h5>
						<p class="card-text text-justify">Trasladate con nosotros, contamos con una excelente plana docente, así como un plan para la educación virtual</p>
						<p class="card-text textoabajo"><small class="text-muted">Actualizado hoy</small></p>
					  </div>
					</div>
					<div class="card">
						<img class="card-img-top" src="images/card4.jpg" alt="Card image cap">
						<div class="card-body">
						  <h5 class="card-title negro">Campeones en natación</h5>
						  <p class="card-text text-justify">Felicidades a quienes nos representarán en la etapa nacional. Natación, Atletismo y a nuestra estudiante que representó a nuestro país a nivel internacional en la disciplina de Taekwondo</p>
						  <p class="card-text textoabajo"><small class="text-muted">Actualizado hoy</small></p>
						</div>
					  </div>
				  </div>
			</div>
		</div>
		<hr class="bg-success">
		<section class="background-11  text-center">
			<div class="container">
				<div class="row mb-6">
					<div class="col">
						<h3 class="fs-2 fs-md-3"> Nuestro equipo de trabajo</h3>
						<hr class="short" data-zanim="{&quot;from&quot;:{&quot;opacity&quot;:0,&quot;width&quot;:0},&quot;to&quot;:{&quot;opacity&quot;:1,&quot;width&quot;:&quot;4.20873rem&quot;},&quot;duration&quot;:0.8}" style="width: 4.20873rem; opacity: 1;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-lg-4">
						<div class="background-white pb-4 h-100 radius-secondary"><img class="mb-4 radius-tr-secondary radius-tl-secondary" src="assets/images/portrait-3.jpg" alt="Profile Picture">
							<div class="px-4" data-zanim-timeline="{}">
								<div class="overflow-hidden">
									<h5 data-zanim="{&quot;delay&quot;:0}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Herless Valdivia</h5>
								</div>
								<div class="overflow-hidden">
									<h6 class="fw-400 color-7" data-zanim="{&quot;delay&quot;:0.1}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Director</h6>
								</div>
								<div class="overflow-hidden">
									<p class="py-3 mb-0" data-zanim="{&quot;delay&quot;:0.2}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Director del colegio Sollertia.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-4 mt-4 mt-sm-0">
						<div class="background-white pb-4 h-100 radius-secondary"><img class="mb-4 radius-tr-secondary radius-tl-secondary" src="assets/images/portrait-4.jpg" alt="Profile Picture">
							<div class="px-4" data-zanim-timeline="{}">
								<div class="overflow-hidden">
									<h5 data-zanim="{&quot;delay&quot;:0}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Promotora</h5>
								</div>
								<div class="overflow-hidden">
									<h6 class="fw-400 color-7" data-zanim="{&quot;delay&quot;:0.1}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Promotora</h6>
								</div>
								<div class="overflow-hidden">
									<p class="py-3 mb-0" data-zanim="{&quot;delay&quot;:0.2}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">leads Elixir UK and oversees the company’s Customer Operations teams supporting millions ofr users.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-4 mt-4 mt-lg-0">
						<div class="background-white pb-4 h-100 radius-secondary"><img class="mb-4 radius-tr-secondary radius-tl-secondary" src="assets/images/portrait-5.jpg" alt="Profile Picture">
							<div class="px-4" data-zanim-timeline="{}">
								<div class="overflow-hidden">
									<h5 data-zanim="{&quot;delay&quot;:0}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Thomas Anderson</h5>
								</div>
								<div class="overflow-hidden">
									<h6 class="fw-400 color-7" data-zanim="{&quot;delay&quot;:0.1}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Docente</h6>
								</div>
								<div class="overflow-hidden">
									<p class="py-3 mb-0" data-zanim="{&quot;delay&quot;:0.2}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">As the VP of People, Thomas’s focus lies in the development and optimization of talent retention.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-4 mt-4">
						<div class="background-white pb-4 h-100 radius-secondary"><img class="mb-4 radius-tr-secondary radius-tl-secondary" src="assets/images/portrait-6.jpg" alt="Profile Picture">
							<div class="px-4" data-zanim-timeline="{}">
								<div class="overflow-hidden">
									<h5 data-zanim="{&quot;delay&quot;:0}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Legartha Mantana</h5>
								</div>
								<div class="overflow-hidden">
									<h6 class="fw-400 color-7" data-zanim="{&quot;delay&quot;:0.1}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Docente</h6>
								</div>
								<div class="overflow-hidden">
									<p class="py-3 mb-0" data-zanim="{&quot;delay&quot;:0.2}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">As General Counsel of Elixir, Tony oversees global legal activities and policies across all aspects.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-4 mt-4">
						<div class="background-white pb-4 h-100 radius-secondary"><img class="mb-4 radius-tr-secondary radius-tl-secondary" src="assets/images/portrait-7.jpg" alt="Profile Picture">
							<div class="px-4" data-zanim-timeline="{}">
								<div class="overflow-hidden">
									<h5 data-zanim="{&quot;delay&quot;:0}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">John Snow</h5>
								</div>
								<div class="overflow-hidden">
									<h6 class="fw-400 color-7" data-zanim="{&quot;delay&quot;:0.1}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Docente</h6>
								</div>
								<div class="overflow-hidden">
									<p class="py-3 mb-0" data-zanim="{&quot;delay&quot;:0.2}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">John has overseen the meteoric growth while protecting scaling its uniquely creative and culture.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-4 mt-4">
						<div class="background-white pb-4 h-100 radius-secondary"><img class="mb-4 radius-tr-secondary radius-tl-secondary" src="assets/images/portrait-1.jpg" alt="Profile Picture">
							<div class="px-4" data-zanim-timeline="{}">
								<div class="overflow-hidden">
									<h5 data-zanim="{&quot;delay&quot;:0}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Ragner Lothbrok</h5>
								</div>
								<div class="overflow-hidden">
									<h6 class="fw-400 color-7" data-zanim="{&quot;delay&quot;:0.1}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Docente</h6>
								</div>
								<div class="overflow-hidden">
									<p class="py-3 mb-0" data-zanim="{&quot;delay&quot;:0.2}" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Ragner, SVP of Engineering, oversees Elixir’s vast engineering organization which drives the core programming.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/.row-->
			</div>
			<!--/.container-->
		</section>
	</div>
{{--  --}}
  <!-- The Modal -->
  <div class="modal" id="myModal" >
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <div class="modal-body">
			<div class="row justify-content-center">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1973.6190752314915!2d-74.53779263925907!3d-8.37822005665728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91a3bce5db60b065%3A0x45f97a1834dc94e0!2sColegio%20Sollertia!5e0!3m2!1ses-419!2spe!4v1590988925595!5m2!1ses-419!2spe" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

			</div>
        </div>
      </div>
    </div>
  </div>
{{--  --}}
{{-- inicio --}}
{{-- gin --}}
	<footer class="full-reset footer bg-azul">
		<div class="full-reset" style="padding: 15px 0;">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<h4 class="titles text-center blanco">Visitenos en</h4>
						<p class="text-center negro" data-toggle="modal" data-target="#myModal">Jr. Pastaza N. 116</p>
					</div>
					<div class="col-xs-12 col-sm-4">
						<h4 class="titles text-center blanco">Contactenos</h4>
						<p class="text-center negro">Teléfono: +(51)949 947 194 <br>Correo Electrónico: informes@sollertia.com</p>
					</div>
					<div class="col-xs-12 col-sm-4">
						<h4 class="titles subtitles-footer blanco">Siguenos en</h4>
						<ul class="list-unstyled links-footer">
							<li><a href="https://www.facebook.com/ColegioSollertia" target="_blank"  class="open-link-newTab"><i class="fa fa-facebook"></i> &nbsp; Facebook</a></li>
							<!-- <li><a href="#!" class="open-link-newTab"><i class="fa fa-twitter"></i> &nbsp; Twitter</a></li> -->
							<li><a href="https://www.youtube.com/channel/UCwFvavQ06QpcNE0VVWgFcAQ" target="_blank" class="open-link-newTab"><i class="fa fa-youtube"></i> &nbsp; Youtube</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-md-12 text-center">
						<div class="full-reset  footer-copyright"><i class="fa fa-copyright"></i> 2020 Desarrollado para Sollertia</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>