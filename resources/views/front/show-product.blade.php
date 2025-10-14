@extends('layouts.front')
@section('title-url', 'تفاصيل المنتج')

@section('content')
<section class="py-5 bg-light" id="product" dir="rtl">
    <div class="container">
        <div class="row g-5 align-items-start">

            <!-- صورة المنتج -->
            <div class="col-lg-6">
                <div class="product-gallery card border-0 shadow-sm rounded-4 overflow-hidden bg-white p-4 text-center">
                    <img src="{{ asset('uploads/' . $product->image) }}" 
                         class="img-fluid rounded-4 mx-auto d-block product-image"
                         alt="{{ $product->name }}"
                         style="max-height: 480px; object-fit: contain; transition: all 0.4s ease;">
                </div>
            </div>

            <!-- تفاصيل المنتج -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">

                    <!-- الاسم -->
                    <h2 class="fw-bold text-dark mb-2">{{ $product->name }}</h2>

                    <!-- السعر والخصم -->
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <h4 class="text-success fw-bold mb-0">
                            {{ number_format($product->price, 2) }} <span class="fs-6">ج.م</span>
                        </h4>
                        @if($product->old_price)
                            <span class="text-muted text-decoration-line-through">
                                {{ number_format($product->old_price, 2) }} ج.م
                            </span>
                            <span class="badge bg-warning text-dark">-{{ round((($product->old_price-$product->price)/$product->old_price)*100) }}%</span>
                        @endif
                    </div>

                    <!-- الفئة والتقييم -->
                    <div class="d-flex align-items-center gap-3 mb-3 flex-wrap">
                        <div class="d-inline-flex align-items-center bg-light px-3 py-2 rounded-pill">
                            <i class="fa fa-tag text-primary ms-2"></i>
                            <span class="fw-semibold text-dark">{{ $product->category->name }}</span>
                        </div>
                        <div class="d-inline-flex align-items-center gap-1">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star-half-alt text-warning"></i>
                            <span class="text-muted"></span>
                        </div>
                    </div>

                    <!-- خيارات المنتج -->
                    @if($product->sizes)
                    <div class="mb-4">
                        <h6 class="fw-bold mb-2">اختر المقاس</h6>
                        <div class="d-flex gap-2 flex-wrap">
                            @foreach($product->sizes as $size)
                                <button type="button" class="btn btn-outline-secondary btn-sm">{{ $size }}</button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- الوصف -->
                    <p class="text-muted fs-6 lh-lg mb-4 border-top pt-3">
                        {{ $product->description }}
                    </p>

                    <!-- أزرار التفاعل -->
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

                    <!-- العروض -->
                    <div class="mb-4">
                        <p class="mb-1 text-primary"><i class="fa fa-truck"></i> توصيل ذكي، سريع، ومضمون</p>
                        <p class="mb-1 text-secondary"><i class="fa fa-credit-card"></i> اشترِ الآن وادفع لاحقًا بعدين</p>
                    </div>

                    <!-- المشاركة -->
                    <div class="share-section border-top pt-3">
                        <h6 class="fw-bold text-dark mb-3">شارك المنتج عبر</h6>
                        <ul class="list-unstyled d-flex justify-content-start gap-3 fs-5 mb-0">
                            <li><a href="#" class="text-primary"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="text-success"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a href="#" class="text-dark"><i class="fab fa-tiktok"></i></a></li>
                            <li><a href="#" class="text-danger"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<style>
    #product .product-gallery:hover .product-image {
        transform: scale(1.05);
        filter: brightness(0.95);
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
        #product h2 { font-size: 1.4rem; }
        #product h4 { font-size: 1.2rem; }
        .btn-lg { font-size: 0.9rem; }
        .product-image { max-height: 350px !important; }
    }
</style>
@endsection
