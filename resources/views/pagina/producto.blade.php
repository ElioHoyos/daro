@extends('layouts.header')
@section('content')

<!-- Single Page -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <!-- tittle heading -->
        <br>
        <br>
        <h3 class="tittle-w3l">Descripción del Producto
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <div class="col-md-5 single-right-left ">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    <ul class="slides">
                        <li data-thumb="{{asset($productos->url)}}">
                            <div class="thumb-image">
                                <img src="{{asset($productos->url)}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                        </li>
                        
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-7 single-right-left simpleCart_shelfItem">
            <h3>{{$productos->nombre}}</h3>
            <p>
                <span class="item_price">{{$productos->codigo}}</span>
            </p>
            <div class="single-infoagile">
                <ul>
                    <li>
                        {{$productos->descripcion}}
                    </li>
                    
                </ul>
            </div>
            {{-- {{$productos}} --}}
            <div class="product-single-w3l">
                <table>
                    <tr>
                      <th>Producto</th>
                      <th><img src="{{asset('images/long-1.png')}}" alt=""></th>
                      <th><img src="{{asset('images/long-1.png')}}" alt=""></th>
                      <th><img src="{{asset('images/tipo-sierra.png')}}" alt=""></th>
                      <th><img src="{{asset('images/gramo.png')}}" alt=""></th>
                      <th><img src="{{asset('images/oz.png')}}" alt=""></th>
                    </tr>
                    <tr>
                      <td>{{$productos->codigo}}</td>
                      <td>{{$productos->longitud2}}</td>
                      <td>{{$productos->longitud1}}</td>
                      <td>{{$productos->altura}}</td>
                      <td>{{$productos->peso}}</td>
                    </tr>
                   
                  </table>
                  <p style="font-size: 12px"><strong>{{$productos->etiquetas}}</strong></p>
            </div>

        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //Single Page -->

@endsection