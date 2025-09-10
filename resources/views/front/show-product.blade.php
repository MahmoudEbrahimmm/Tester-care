@extends('layouts.front')
@section('title-url','صفحة تفاصيل المنتج')
@section('content')

    <!-- ***** Main Banner Area Start ***** -->
    <div class="" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2> {{$product->name}} </h2>
                        <span>{{$product->category->name}} &amp; {{$product->description}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="left-images">
                    <img src="{{asset('storage/'.$product->image)}}" style="width:60%;" alt="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <h4>{{$product->name}} </h4>
                    <span class="price">$ {{$product->price}} </span>
                    <ul class="stars">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>{{$product->description}}</span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i><p>{{$product->category->name}} </p>
                    </div>
                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>اختار الكمية</h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                            </div>
                        </div>
                    </div>
                    <div class="total">
                        <div class="main-border-button"><a href="{{route('cart',$product->slug)}}">اضف الي السلة</a></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

@endsection