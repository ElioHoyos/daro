@extends('layouts.header')
@section('content')
{{-- @php
  use App\productos;
  $productos = productos::all();
@endphp --}}
<!-- top Products -->
<div class="ads-grid">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l" style="font-size: 40px;">Lista de Productos
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <!-- product left -->
        <div class="side-bar col-md-3">
            <div class="search-hotel">
                <h3 class="agileits-sear-head">Buscar...</h3>
                <form action="#" method="post">
                    <input type="search" placeholder="Código|Nombre..." name="search" required="">
                    <input type="submit" value=" ">
                </form>
            </div>
           
        </div>
        <!-- //product left -->
        <!-- product right -->
        <div class="agileinfo-ads-display col-md-9 w3l-rightpro">
            <div class="wrapper">
                <!-- first section -->
                <div class="product-sec1">
                    {{-- @foreach ($productos as $item) --}}
                    <div class="col-xs-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{asset('images/cinta-metrica.png')}}" style="width: 90%; height: 90%;" alt="">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        
                                    <a href="{{asset('images/cinta-metrica.png')}}" target="_blank" class="link-product-add-cart">Ver Más</a>
                                       
                                    </div>
                                </div>
                                <span class="product-new-top">Nuevo</span>
                            </div>
                            <div class="item-info-product ">
                                <h4>
                                    <a href="#" target="_blank">Cinta Metrica</a>
                                </h4>
                                
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                   
                    <div class="clearfix"></div>
                </div>
                <!-- //first section -->
               
            </div>
        </div>
        <!-- //product right -->
    </div>
</div>
<!-- //top products -->

@endsection
