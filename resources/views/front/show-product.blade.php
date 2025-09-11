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
                            <ul class="list-unstyled d-flex gap-3">
    <li>
        <a href="#" target="_blank" class="text-primary">
            <i class="fab fa-facebook-f fa-lg"></i>
        </a>
    </li>
    <li>
        <a href="https://wa.me/2010020258177" target="_blank" class="text-success">
            <i class="fab fa-whatsapp fa-lg"></i>
        </a>
    </li>
    <li>
        <a href="#" target="_blank" class="text-dark">
            <i class="fab fa-tiktok fa-lg"></i>
        </a>
    </li>
    <li>
        <a href="https://www.instagram.com/ahmed.r2fat.1192" target="_blank" class="text-danger">
            <i class="fab fa-instagram fa-lg"></i>
        </a>
    </li>
</ul>

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
