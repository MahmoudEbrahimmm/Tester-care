@extends('layouts.front')
@section('title-url', 'صفحة تفاصيل المنتج')
@section('content')

    <!-- ***** Product Details Starts ***** -->
    <section class="py-5" id="product" dir="rtl">
        <div class="container">
            <div class="row g-4 align-items-center">

                <!-- صورة المنتج -->
                <div class="col-lg-6 text-center">
                    <div class="card shadow-lg border-0 rounded-4 p-3">
                        <img src="{{ asset('uploads/' . $product->image) }}" 
                             class="img-fluid rounded-4" 
                             style="max-height: 450px; object-fit: contain;" 
                             alt="{{ $product->name }}">
                    </div>
                </div>

                <!-- تفاصيل المنتج -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm rounded-4 p-4 text-end">
                        
                        <!-- الاسم + السعر -->
                        <h2 class="fw-bold mb-3">{{ $product->name }}</h2>
                        <h4 class="text-success fw-bolder mb-4">$ {{ $product->price }}</h4>

                        <!-- أيقونات المشاركة -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">شارك المنتج</h6>
                            <ul class="list-unstyled d-flex gap-3 fs-5 justify-content-end">
                                <li>
                                    <a href="https://www.facebook.com/share/15LXLfbLJc/" target="_blank" class="text-primary">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wa.me/01554866941" target="_blank" class="text-success">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.tiktok.com/@tester9471?_t=ZS-8zmaHzQWN62&_r=1" target="_blank" class="text-dark">
                                        <i class="fab fa-tiktok"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/ahmed.r2fat.1192" target="_blank" class="text-danger">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- الوصف -->
                        <p class="text-muted fs-6 mb-4">{{ $product->description }}</p>

                        <!-- الفئة -->
                        <div class="bg-light p-3 rounded-3 mb-4 d-flex align-items-center justify-content-end">
                            <span class="fw-semibold">{{ $product->category->name }}</span>
                            <i class="fa fa-quote-left text-primary me-2"></i>
                        </div>

                        <!-- الأزرار -->
                        <div class="d-grid gap-3">
                            <a href="{{ route('add.to.cart', $product->id) }}" 
                               class="btn btn-primary btn-lg rounded-pill shadow-sm d-flex align-items-center justify-content-center gap-2">
                                <i class="fa fa-shopping-cart"></i> 
                                <span>أضف إلى السلة</span>
                            </a>
                            <a href="{{ route('home') }}" 
                               class="btn btn-outline-secondary btn-lg rounded-pill d-flex align-items-center justify-content-center gap-2">
                                <i class="fa fa-home"></i> 
                                <span>الصفحة الرئيسية</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Details Ends ***** -->

@endsection
