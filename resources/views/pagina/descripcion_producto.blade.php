@extends('layouts.header')
@section('content')

<!-- Single Page -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Descripcion del Producto
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
                        <li data-thumb="{{asset('images/cinta-metrica.png')}}">
                            <div class="thumb-image">
                                <img src="{{asset('images/cinta-metrica.png')}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                        </li>
                        
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-7 single-right-left simpleCart_shelfItem">
            <h3>Cinta Metrica</h3>
            <p>
                <span class="item_price">0912</span>
            </p>
            <div class="single-infoagile">
                <ul>
                    <li>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                        Consectetur maiores, adipisci aspernatur assumenda beatae illo sapiente,
                         non ut eveniet sequi error odit, 
                        tempora exercitationem asperiores nemo illum? Veniam, dolor quidem.
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
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>51</td>
                      <td>615 g</td>
                    </tr>
                   
                  </table>
                  <p style="font-size: 12px"><strong>Carpínteria</strong></p>
            </div>
            
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //Single Page -->

@endsection