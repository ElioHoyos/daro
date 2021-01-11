@extends('layouts.header')
@section('content')
    
@php
    use App\configuraciones;
    use App\personal;
    use App\catalogos;
    // use App\categorias;
    $year = date("Y");
    $mision = configuraciones::where("tipo","MISION")->first();
    $vision = configuraciones::where("tipo","VISION")->first();
    $nosotros = configuraciones::where("tipo","NOSOTROS")->first();
    $personal = personal::all();
    $catalogos = catalogos::join("categorias as c","catalogos.Marca","c.id")
                 ->select("c.nombre AS Marca","catalogos.url")->get();
    // dd($catalogos);
@endphp

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset('images/fondo3.jpg')}}" alt="First slide">
        </div>
        
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('images/ferreteriaaa.png')}}" alt="Second slide">
        </div>
        
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3 class="tittle-w3l">Sobre Nosotros
            <span class="heading-style">
              <i></i>
              <i></i>
              <i></i>
            </span>
          </h3>
        </header>
        @if (isset($nosotros))
        <div class="row about-container">

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
            
            <img src="{{asset($nosotros->url)}}" class="img-fluid" alt="">
            
          </div>
          <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
            <p id="intros" style="text-align: justify">
              
                {{$nosotros->detalle}}
                
            </p>
          </div>
        </div>
        @endif

        @if (isset($mision))
        <div class="row about-container">

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
            
            <img src="{{asset($mision->url)}}" class="img-fluid" alt="">
            
          </div>
          <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
            <p id="intros" style="text-align: justify">
              
                {{$mision->detalle}}
                
            </p>
          </div>
        </div>
        @endif

        @if (isset($vision))
        <div class="row about-container">

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
            
            <img src="{{asset($vision->url)}}" class="img-fluid" alt="">
            
          </div>
          <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
            <p id="intros" style="text-align: justify">
              
                {{$vision->detalle}}
                
            </p>
          </div>
        </div>
        @endif
        

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3 class="tittle-w3l">Nuestros Catálogos
            <span class="heading-style">
              <i></i>
              <i></i>
              <i></i>
            </span>
          </h3>
          </header>


        <div class="row">
          @foreach ($catalogos as $item)
          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-bookmarks-outline" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a target="_blank" href="#">{{$item->Marca}}</a></h4>
              <p class="description"><a href="{{$item->url}}" download><img src="{{asset('images/pdf.svg')}}" class="img-fluid" style="width: 32px"></a>  | <a target="_blank" href="{{$item->url}}"><img src="{{asset('images/ver.svg')}}" class="img-fluid" style="width: 32px"></a></p>
            </div>
          </div>    
          @endforeach
          
          {{-- <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-bookmarks-outline" style="color:#e9bf06;"></i></div>
              <h4 class="title"><a href="">Master BAHCO</a></h4>
              <p class="description"><img src="{{asset('images/pdf.svg')}}" class="img-fluid" style="width: 32px"> | <img src="{{asset('images/ver.svg')}}" class="img-fluid" style="width: 32px"></p>
            </div>
          </div> --}}

        </div>

      </div>
    </section><!-- #services -->

    
    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header">
          <h3 class="tittle-w3l">Nuestro Personal
            <span class="heading-style">
              <i></i>
              <i></i>
              <i></i>
            </span>
          </h3>
        </div>

        <div class="row">
          @foreach ($personal as $item)
          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="{{asset($item->url)}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                 
                  <h4>{{$item->nombre}}</h4>
                  
                  
                  <span>{{$item->descripcion}}</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3 class="tittle-w3l">Formulario de Contacto
            <span class="heading-style">
              <i></i>
              <i></i>
              <i></i>
            </span>
          </h3>
        </div>

        <div class="row wow fadeInUp">

          <div class="col-lg-6">
            <div class="map mb-4 mb-lg-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7894.010581077636!2d-74.580329!3d-8.401139!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMjQnMDQuMSJTIDc0wrAzNCc0OS4yIlc!5e0!3m2!1ses!2spe!4v1603209661989!5m2!1ses!2spe" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-5 info">
                <i class="ion-ios-location-outline"></i>
                <p style="font-size: 12px">Av. Habilitacion urbana municipal Mz.C Lt. 6</p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-email-outline"></i>
                <p style="font-size: 12px">oficina.darosac@gmail.com</p>
              </div>
              <div class="col-md-3 info">
                <i class="ion-ios-telephone-outline"></i>
                <p style="font-size: 12px">986 135 157</p>
              </div>
            </div>

            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Escribe tu Nombre" data-rule="minlen:4" data-msg="Por favor, introduzca al menos 4 caracteres" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Escribe tu correo" data-rule="email" data-msg="Por favor, introduzca un correo electrónico válido" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Escribe el asunto" data-rule="minlen:4" data-msg="Por favor, introduzca al menos 8 caracteres de asunto" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Por favor, escríbenos algo" placeholder="Escribenos un mensaje..!"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Enviar Mensaje</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>

  @endsection