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
                        <li data-thumb="{{asset('images/arco-montaraz.png')}}">
                            <div class="thumb-image">
                                <img src="{{asset('images/arco-montaraz.png')}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                        </li>
                        <li data-thumb="{{asset('images/arco-montaraz.png')}}">
                            <div class="thumb-image">
                                <img src="{{asset('images/arco-montaraz.png')}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                        </li>
                        <li data-thumb="{{asset('images/arco-montaraz.png')}}">
                            <div class="thumb-image">
                                <img src="{{asset('images/arco-montaraz.png')}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-7 single-right-left simpleCart_shelfItem">
            <h3>ARCO MONTARAZ 21</h3>
            <div class="rating1">
                <span class="starRating">
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5">5</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input id="rating3" type="radio" name="rating" value="3" checked="">
                    <label for="rating3">3</label>
                    <input id="rating2" type="radio" name="rating" value="2">
                    <label for="rating2">2</label>
                    <input id="rating1" type="radio" name="rating" value="1">
                    <label for="rating1">1</label>
                </span>
            </div>
            <p>
                <span class="item_price">331-21</span>
                <label>Delivery Gratis</label>
            </p>
            <div class="single-infoagile">
                <ul>
                    <li>
                        Arco tronzador pequeño y manejable de 21
                    </li>
                    <li>
                        Su extremo puntiagudo lo hace ideal para su empleo en espacios reducidos, y se adapta bien a trabajos de jardinería y de reparación de tejados
                    </li>
                </ul>
            </div>
            <div class="product-single-w3l">
                <table>
                    <tr>
                      <th>Producto</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>331-21-51-KP</td>
                      <td>530 mm</td>
                      <td>21 in	</td>
                      <td>51</td>
                      <td>615 g</td>
                    </tr>
                   
                  </table>
                  <p style="font-size: 12px"><strong>Categorías: CARPINTERIA, PODA Y JARDINERIA</strong></p>
            </div>
            
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //Single Page -->

@endsection