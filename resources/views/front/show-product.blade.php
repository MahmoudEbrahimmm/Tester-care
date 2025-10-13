@extends('layouts.front')
@section('title-url', 'تفاصيل المنتج')

@section('content')
<section class="py-5 bg-light" id="product" dir="rtl">
    <div class="container">
        <div class="row g-5 align-items-start">

            <div class="col-lg-6">
                <div class="product-gallery card border-0 shadow-sm rounded-4 overflow-hidden bg-white p-4 text-center">
                    <img src="{{ asset('uploads/' . $product->image) }}" 
                         class="img-fluid rounded-4 mx-auto d-block product-image"
                         alt="{{ $product->name }}"
                         style="max-height: 480px; object-fit: contain; transition: all 0.4s ease;">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">

                    <h2 class="fw-bold text-dark mb-3">{{ $product->name }}</h2>

                    <h4 class="text-success fw-bold mb-4">
                        {{ number_format($product->price, 2) }} <span class="fs-6">ج.م</span>
                    </h4>

                    <div class="d-inline-flex align-items-center bg-light px-3 py-2 rounded-pill mb-4">
                        <i class="fa fa-tag text-primary ms-2"></i>
                        <span class="fw-semibold text-dark">{{ $product->category->name }}</span>
                    </div>

                    <p class="text-muted fs-6 lh-lg mb-4 border-top pt-3">
                        {{ $product->description }}
                    </p>

                    <div class="d-flex gap-3 flex-wrap mb-4">
                        <a href="{{ route('add.to.cart', $product->id) }}" 
                           class="btn btn-success btn-lg rounded-pill shadow-sm flex-grow-1 d-flex align-items-center justify-content-center gap-2">
                            <i class="fa fa-shopping-cart"></i>
                            <span>أضف إلى السلة</span>
                        </a>
                        <a href="{{ route('home') }}" 
                           class="btn btn-outline-secondary btn-lg rounded-pill shadow-sm d-flex align-items-center justify-content-center gap-2">
                            <i class="fa fa-home"></i>
                            
                        </a>
                    </div>

                    <div class="share-section border-top pt-3">
                        <h6 class="fw-bold text-dark mb-3">شارك المنتج عبر</h6>
                        <ul class="list-unstyled d-flex justify-content-start gap-3 fs-5 mb-0">
                            <li><a href="https://www.facebook.com/share/15LXLfbLJc/" target="_blank" class="text-primary"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://wa.me/01554866941" target="_blank" class="text-success"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a href="https://www.tiktok.com/@tester9471?_t=ZS-8zmaHzQWN62&_r=1" target="_blank" class="text-dark"><i class="fab fa-tiktok"></i></a></li>
                            <li><a href="https://www.instagram.com/ahmed.r2fat.1192" target="_blank" class="text-danger"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===== CSS ===== -->
<style>
    body {
        background-color: #f9fafb !important;
    }

    #product .product-gallery:hover .product-image {
        transform: scale(1.05);
        filter: brightness(0.95);
    }

    #product h2 {
        font-size: 1.8rem;
        line-height: 1.4;
    }

    #product h4 {
        font-size: 1.5rem;
    }

    .btn-success {
        background: linear-gradient(90deg, #fdcb6e, #f39c12);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 18px rgba(25, 135, 84, 0.3);
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: #fff;
        transform: translateY(-2px);
    }

    .share-section a {
        transition: all 0.3s ease;
    }

    .share-section a:hover {
        transform: scale(1.2);
        opacity: 0.8;
    }

    @media (max-width: 768px) {
        #product h2 {
            font-size: 1.4rem;
        }

        #product h4 {
            font-size: 1.2rem;
        }

        .btn-lg {
            font-size: 0.9rem;
        }

        .product-image {
            max-height: 350px !important;
        }
    }
</style>
@endsection
