@extends('layouts.header')
@section('content')

<!-- top Products -->
<div class="ads-grid">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Lista de Productos
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
                <h3 class="agileits-sear-head">Search Here..</h3>
                <form action="#" method="post">
                    <input type="search" placeholder="Product name..." name="search" required="">
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
                    <div class="col-xs-4 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{asset('new/images/k1.jpg')}}" alt="">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="single.html" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>
                            </div>
                            <div class="item-info-product ">
                                <h4>
                                    <a href="single.html">Zeeba Basmati Rice</a>
                                </h4>
                                <div class="info-product-price">
                                    <span class="item_price">$950.00</span>
                                    <del>$1020.00</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Zeeba Basmati Rice - 5 KG" />
                                            <input type="hidden" name="amount" value="950.00" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{asset('new/images/k2.jpg')}}" alt="">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="single.html" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4>
                                    <a href="single.html">Maiyas Gulab Jamun</a>
                                </h4>
                                <div class="info-product-price">
                                    <span class="item_price">$137.00</span>
                                    <del>$420.00</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Maiyas Gulab Jamun, 500g" />
                                            <input type="hidden" name="amount" value="137.00" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{asset('new/images/k3.jpg')}}" alt="">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="single.html" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4>
                                    <a href="single.html">Lipton Green Tea</a>
                                </h4>
                                <div class="info-product-price">
                                    <span class="item_price">$384.00</span>
                                    <del>$480.00</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Lipton Green Tea, 100 Pieces" />
                                            <input type="hidden" name="amount" value="384.00" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- //first section -->
                <!-- 2nd section) -->
                <div class="product-sec1">
                    <div class="col-md-4 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{asset('new/images/k4.jpg')}}" alt="">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="single.html" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>
                            </div>
                            <div class="item-info-product ">
                                <h4>
                                    <a href="single.html">Organicana Red Chilli</a>
                                </h4>
                                <div class="info-product-price">
                                    <span class="item_price">$70.00</span>
                                    <del>$90.00</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Organicana Red Chilli Powder, 100g" />
                                            <input type="hidden" name="amount" value="70.00" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                   
                    
                    <div class="clearfix"></div>
                </div>
                <!-- //2nd section  -->
                
            </div>
        </div>
        <!-- //product right -->
    </div>
</div>
<!-- //top products -->

@endsection
