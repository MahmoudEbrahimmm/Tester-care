@extends('layouts.front')
@section('title-url', 'صفحة تفاصيل المنتج')
@section('content')

    <!-- ***** Main Banner Area Start ***** -->
    <div class="" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2> {{ $product->name }} </h2>
                        <span>{{ $product->category->name }} &amp; {{ $product->description }}</span>
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
                        <img src="{{ asset('storage/' . $product->image) }}" style="width:60%;" alt="">
                    </div>
                </div>
                <div class="col-lg-4 mt-5">
                    <div class="right-content">
                        <h4>{{ $product->name }} </h4>
                        <span><h3>$ {{ $product->price }}</h3></span>
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul><br>
                        <h5 class="mb-">{{ $product->description }}</h5>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>{{ $product->category->name }}</p>
                        </div>
                        
                        <div class="total">
                            <div><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-primary w-100 text-white mt-3">اضف الي السلة</a>
                            <div><a href="{{ route('home') }}" class="btn btn-secondary w-100 text-white mt-3">الصفحة الرئيسية</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

@endsection
