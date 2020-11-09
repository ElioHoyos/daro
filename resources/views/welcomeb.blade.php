<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Institucion</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/modernizr.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</head>
<style>
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
</style>
<body>
	<!--======================================== Boton ir arriba ========================================-->
	<i class="btn-up fa fa-arrow-circle-o-up hidden-xs"></i>
	<!--======================================== Navegación ========================================-->
	<header class="full-reset header">
		<!--======================================== Logo(Nombre INS) ========================================-->
		<div class="full-reset logo">
			<span class="hidden-lg hidden-md">SOLLERTIA</span>
			<span class="hidden-xs hidden-sm"><img src="images/logo1.png" height="40" width="200" alt="no image"></span>
		</div>
		<!--======================================== Links de navegación Institución Educativa Privada SOLLERTIA========================================-->
		<nav class="full-reset navigation">
			<ul class="full-reset list-unstyled">
				<li><a href="index.html">Inicio</a></li>
				<li><a href="#">Institución</a></li>
				<li><a href="#">Secretaría</a></li>
				<li><a href="login">Intranet</a></li>
				<li><a href="#">Galería</a></li>
				<li><a href="#" class="btm-mega-menu">Más &nbsp;<i class="fa fa-caret-down"></i></a></li>
			</ul>
		</nav>
		<!--======================================== Mega menu ========================================-->
		<div class="full-reset mega-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<span class="full-reset titles">Recursos educativos</span>
						<ul class="list-unstyled full-reset">
							<li><a href="#!" class="open-link-newTab"><i class="fa fa-search"></i>&nbsp; Buscar en GOOGLE</a></li>
							<li><a href="#!" class="open-link-newTab"><i class="fa fa-graduation-cap"></i>&nbsp; Plataforma (MOODLE)</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-4">
						<span class="full-reset titles">Enlaces importantes</span>
						<ul class="list-unstyled full-reset">
							<li><a href="#!" class="open-link-newTab"><i class="fa fa-university"></i>&nbsp; Aprendo en casa</a></li>
							<!-- <li><a href="#!"><i class="fa fa-paw"></i>&nbsp; ARA-MACAO</a></li> -->
							<!-- <li><a href="#!"><i class="fa fa-globe"></i>&nbsp; JOVENES A.T.T</a></li> -->
							<li><a href="#!" class="open-link-newTab"><i class="fa fa-flask"></i>&nbsp; Clases Online</a></li>
							<li><a href="#!" class="open-link-newTab"><i class="fa fa-gavel"></i>&nbsp; Recursos educativos</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-4">
						<span class="full-reset titles">Archivos</span>
						<ul class="list-unstyled full-reset">
							<li><a href="#!"><i class="fa fa-star-o"></i>&nbsp; Manual del estudiante</a></li>
							<li><a href="#!" class="open-link-newTab"><i class="fa fa-file-text-o"></i>&nbsp; Const. de conducta</a></li>
							<li><a href="#!"><i class="fa fa-download"></i>&nbsp; Descargas</a></li>
						</ul>
					</div>
				</div>
			</div>
			<i class="fa fa-times-circle btm-mega-menu close-mega-menu fa-2x"></i>
		</div>
		<!--======================================== Boton menu mobil ========================================-->
		<a href="#" class=" hidden-sm hidden-md hidden-lg pull-right button-menu-mobile show-close-menu-m"><i class="fa fa-ellipsis-v"></i></a>
	</header>
	<!--======================================== Logo & Lema ========================================-->
	<section class="full-reset font-cover">
		{{-- <section class="full-reset font-cover" style="background-image: url(images/fondo1.jpg);"> --}}
		<div class="full-reset" style="height: 100%; background-color: rgba(255,255,255,.6); padding: 60px 0;">
			<h1 class="text-center titles">Institución Educativa Privada SOLLERTIA</h1>
			<figure class="Logo-Ins-Index">
				<img src="images/logo.png" alt="Logo" class="img-responsive">
			</figure>
			<p class="lead text-center">
				"Educación para la vida"
			</p>
		</div>
	</section>
	<div class="divider-general"></div>
	<!--======================================== Video corto & carrusel========================================-->
	<section class="full-reset" style="background-color: rgb(242, 242, 242); padding: 40px 0;">
		<div class="container">
			<h2 class="text-center titles">Instalaciones de la institución</h2>
			<br><br>
			<!--======================================== Carrusel ========================================-->
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-sm-push-6">
					<h3 class="text-center titles">Fotos Instalaciones</h3>
					<p class="lead">Nuestra galería de fotos
					<a href="http://ins-sensunte.net/imagenes/espacio_ins/Flash01/index.html" class="open-link-newTab">Has click aqui para ver las fotos</a>
					</p>
					<i class="fa fa-picture-o icon-index hidden-xs hidden-sm"></i>
				</div>
				<div class="col-xs-12 col-sm-6 col-sm-pull-6">
					<div id="slider-ins" class="carousel slide" data-ride="carousel">
					  <!-- Indicadores -->
					  <ol class="carousel-indicators">
					    <li data-target="#slider-ins" data-slide-to="0" class="active"></li>
					    <li data-target="#slider-ins" data-slide-to="1"></li>
					    <li data-target="#slider-ins" data-slide-to="2"></li>
					  </ol>

					  <!-- Imagenes -->
					  <div class="carousel-inner" role="listbox">
						
						<!-- Primera imagen -->
					    <div class="item active">
					      <img src="images/slide1.jpg" alt="Default">
					      <div class="carousel-caption">
					        Nuestra Institución
					      </div>
					    </div>
						
						<!-- Segunda imagen -->
					    <div class="item">
					      <img src="images/slide2.jpg" alt="Default">
					      <div class="carousel-caption">
					        Nuestra Institución
					      </div>
					    </div>
						
						<!-- Tercera imagen -->
					    <div class="item">
					      <img src="images/slide3.jpg" alt="Default">
					      <div class="carousel-caption">
					        Nuestra Institución
					      </div>
					    </div>
					    
					  </div>

					  <!-- Controles -->
					  <a class="left carousel-control" href="#slider-ins" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#slider-ins" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
			</div>
			<br>
			<div class="divider-general"></div>
			<br>
			<!--======================================== Video ========================================-->
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<h3 class="text-center titles">Videos educativos</h3>
					<p class="lead">Aprendo en Casa</p>
					<!-- <i class="fa fa-film icon-index hidden-xs hidden-sm"></i> -->
				</div>
				<div class="col-xs-12 col-sm-6">
					<!-- <video controls> -->
						<!-- <source src="assets/video/Introl.mp4" type="video/mp4"> -->
							<iframe width="640" height="360" src="https://www.youtube.com/embed/2Tt7NpojBfM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<!-- </video> -->
				</div>
			</div>
		</div>
	</section>
	<div class="divider-general"></div>
	<!--======================================== Acontecer institucional ========================================-->
	<section class="events-ins">
		<div class="container-fluid">
			<h2 class="text-center titles">ACONTECER INSTITUCIONAL</h2>
			<br><br>
			<div class="row">
				<!--======================================== Articulo 1 ========================================-->
				<article class="col-xs-12 col-sm-6 col-md-4">
					<div class="thumbnail">
				      <img src="images/act1.png" alt="IMG" class="img-responsive img-rounded">
				      <div class="caption">
				        <h3 class="text-center">Clases virtuales</h3>
				        <p class="text-justify">Aprendo en casa</p>
				        <p class="text-center"><a href="#" class="btn btn-primary" role="button">Ver imágenes</a></p>
				      </div>
				    </div>
				</article>
				<!--======================================== Articulo 2 ========================================-->
				<article class="col-xs-12 col-sm-6 col-md-4">
					<div class="thumbnail">
				      <img src="images/act2.jpg" alt="IMG" class="img-responsive img-rounded">
				      <div class="caption">
				        <h3 class="text-center">Taller</h3>
				        <p class="text-justify">Emponderamiento de la mujer</p>
				        <p class="text-center"><a href="#" class="btn btn-primary" role="button">Ver imágenes</a></p>
				      </div>
				    </div>
				</article>
				<!--======================================== Articulo 3 ========================================-->
				<article class="col-xs-12 col-sm-6 col-md-4">
					<div class="thumbnail">
				      <img src="images/act3.jpg" alt="IMG" class="img-responsive img-rounded">
				      <div class="caption">
				        <h3 class="text-center">Festival</h3>
				        <p class="text-justify">Festival de planta medicinal</p>
				        <p class="text-center"><a href="#" class="btn btn-primary" role="button">Ver imágenes</a></p>
				      </div>
				    </div>
				</article>
			</div>
		</div>
	</section>
	<div class="divider-general"></div>
	<!--======================================== Enlaces importantes ========================================-->
	<section class="text-center important-links-index">
		<h2 class="titles">Sitios y enlaces importantes</h2>

		<a href="login" class="open-link-newTab">
			<i class="fa fa-graduation-cap"></i>
			<p>Intranet</p>
		</a>
		<a href="https://wa.me/51949947194" class="open-link-newTab">
			<i class="fa fa-file-text-o"></i>
			<p>Manual</p>
		</a>

		<a href="https://www.facebook.com/ColegioSollertia" class="open-link-newTab">
			<i class="fa fa-facebook"></i>
			<p>Fan Page</p>
		</a>
	</section>
	<!--======================================== Pie de pagina ========================================-->
	<footer class="full-reset footer">
		<div class="full-reset" style="padding: 15px 0;">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<h4 class="titles text-center">Visitenos en</h4>
						<p class="text-center">Jr. Pastaza N. 116</p>
					</div>
					<div class="col-xs-12 col-sm-4">
						<h4 class="titles text-center">Contactenos</h4>
						<p class="text-center">Teléfono: +(51)949 947 194 <br>Correo Electrónico: informes@sollertia.com</p>
					</div>
					<div class="col-xs-12 col-sm-4">
						<h4 class="titles subtitles-footer">Siguenos en</h4>
						<ul class="list-unstyled links-footer">
							<li><a href="https://www.facebook.com/ColegioSollertia" class="open-link-newTab"><i class="fa fa-facebook"></i> &nbsp; Facebook</a></li>
							<!-- <li><a href="#!" class="open-link-newTab"><i class="fa fa-twitter"></i> &nbsp; Twitter</a></li> -->
							<li><a href="https://www.youtube.com/channel/UCwFvavQ06QpcNE0VVWgFcAQ" class="open-link-newTab"><i class="fa fa-youtube"></i> &nbsp; Youtube</a></li>
						</ul>
					</div>
					<div class="col-xs-12">
						<div class="full-reset footer-copyright"><i class="fa fa-copyright"></i> 2020 Antony Salazar</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>