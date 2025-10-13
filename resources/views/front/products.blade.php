@extends('layouts.front')

@section('page-url', 'المنتجات')

@section('content')

<!-- ================= Products Section ================= -->
                <section class="section products-section" id="men" dir="rtl">
                    <div class="container">
                        <div class="section-header d-flex justify-content-between align-items-end mb-3">
                            <div class="text-end">
                                <h2 class="section-title mb-1">المنتجات</h2>
                                <p class="section-desc text-muted small mb-0">أفضل المنتجات بأحسن الأسعار</p>
                            </div>
                            
                        </div>

                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card product-card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                                        <div class="position-relative thumb bg-light">
                                            <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}"
                                                 class="card-img-top product-thumb-img">
                                            <div class="product-actions d-flex">
                                                <a href="{{ route('show.product', $product->slug) }}" class="action-btn" title="عرض">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('add.to.cart', $product->id) }}" class="action-btn" title="أضف للسلة">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            @if(isset($product->discount) && $product->discount > 0)
                                                <span class="badge discount-badge">-{{ $product->discount }}%</span>
                                            @endif
                                        </div>
                                        <div class="card-body p-3 d-flex flex-column">
                                            <h6 class="product-name mb-2 text-truncate">{{ $product->name }}</h6>
                                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                                <div>
                                                    <div class="product-price fw-bold text-primary">
                                                        {{ number_format($product->price, 2) }} ج.م
                                                    </div>
                                                </div>
                                                <div class="text-start">
                                                    <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-sm btn-orange rounded-pill px-3">
                                                        <i class="fa fa-cart-plus me-1"></i> سلة
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination (if used) -->
                        @if(method_exists($products, 'links'))
                        <div class="d-flex justify-content-center mt-4">
                            {{ $products->onEachSide(1)->links('pagination::bootstrap-5') }}
                        </div>
                        @endif
                    </div>
                </section>
                <!-- ================= End Products Section ================= -->    
    
@endsection

<!-- ================= Styles (Bootstrap + custom) ================= -->
@push('styles')
<style>
    :root{
        --accent:#ff7a00; /* orange */
        --accent-dark:#e66a00;
        --muted:#6c757d;
        --card-radius:16px;
    }

    body { background: #f5f6f8; }

    /* Hero */
    .hero-section { padding-top: 3.5rem; padding-bottom: 2.5rem; }
    .hero-title { font-size: 2.1rem; color: #1f2d3d; }
    .brand { color: var(--accent); }
    .hero-sub { max-width: 640px; margin-left: auto; }

    .btn-cta { background: transparent; border: 1px solid rgba(0,0,0,0.08); color: #111; }
    .btn-cta-ghost:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.06); }
    .btn-cart { background: #111; color: #fff; border: none; }
    .btn-cart:hover { background: #222; transform: translateY(-3px); }
    .cart-badge { position: absolute; top: -8px; left: -8px; font-size: 0.72rem; background: #ffc107; color: #111; padding: 0.35rem 0.5rem; }

    /* Product grid (main) */
    .product-card { border-radius: var(--card-radius); overflow: hidden; transition: transform .25s ease, box-shadow .25s ease; }
    .product-card:hover { transform: translateY(-6px); box-shadow: 0 18px 40px rgba(31,45,61,0.08); }
    .thumb { position: relative; height: 220px; display:flex; align-items:center; justify-content:center; overflow:hidden; background: #fff; }
    .product-thumb-img { max-height: 100%; width: auto; object-fit: contain; transition: transform .35s ease; }
    .product-card .product-actions { position: absolute; top: 10px; left: 10px; display:flex; gap:8px; opacity:0; transition: all .25s ease; }
    .product-card:hover .product-actions { opacity:1; transform: translateY(0); }
    .action-btn { display:inline-flex; align-items:center; justify-content:center; width:40px; height:40px; border-radius:50%; background: rgba(255,255,255,0.95); border: 1px solid rgba(0,0,0,0.06); box-shadow: 0 6px 18px rgba(31,45,61,0.06); color:#111; text-decoration:none; }
    .action-btn:hover { background: var(--accent); color:#fff; transform: scale(1.06); }

    .discount-badge { position:absolute; right:10px; top:10px; background: var(--accent); color:#fff; padding:6px 8px; border-radius:8px; font-size:0.8rem; font-weight:700; }

    .product-name { font-size: 0.98rem; height: 44px; overflow: hidden; }
    .product-price { color: var(--accent-dark); font-size: 1rem; }

    .btn-orange { background: linear-gradient(90deg,var(--accent),var(--accent-dark)); color:#fff; border:none; }
    .btn-orange:hover { transform: translateY(-3px); box-shadow: 0 12px 30px rgba(230,106,0,0.18); }

    /* Featured carousel items (small cards) */
    .owl-featured .item-card { padding: 10px; }
    .product-card-sm { border-radius: 12px; }
    .thumb-sm { height: 170px; display:flex; align-items:center; justify-content:center; overflow:hidden; }
    .product-thumb-sm { width:auto; max-height:100%; object-fit:contain; transition: transform .3s; }
    .product-actions-sm { position:absolute; top:8px; left:8px; display:flex; gap:8px; opacity:0; }
    .product-card-sm:hover .product-actions-sm { opacity:1; }

    /* Categories */
    .cat-card { padding: 8px; }
    .cat-thumb { height: 140px; display:flex; align-items:center; justify-content:center; overflow:hidden; }
    .cat-thumb-img { width:100%; height:100%; object-fit:cover; border-radius:8px; }

    /* Media grid */
    .media-section .card { border-radius:12px; overflow:hidden; }

    /* Responsive tweaks */
    @media (max-width: 768px) {
        .hero-title { font-size: 1.6rem; }
        .hero-img { max-height: 260px; }
        .thumb { height: 180px; }
    }

    /* Owl nav custom (if owl carousel used) */
    .owl-carousel .owl-nav button.owl-prev,
    .owl-carousel .owl-nav button.owl-next {
        background: #fff; border: 1px solid rgba(0,0,0,0.06); padding: 8px 10px; border-radius: 8px; box-shadow: 0 8px 20px rgba(31,45,61,0.06);
    }
</style>
@endpush

<!-- ================= Scripts for carousels (uses jQuery + Owl if available) ================= -->
@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Initialize featured carousel if Owl is available
    if (typeof $ !== 'undefined' && typeof $.fn.owlCarousel === 'function') {
        $(".owl-featured").owlCarousel({
            loop: true,
            margin: 18,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3500,
            responsive: { 0: { items: 1 }, 576: { items: 2 }, 768: { items: 3 }, 1200: { items: 4 } }
        });

        $(".owl-categories").owlCarousel({
            loop: true,
            margin: 18,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3800,
            responsive: { 0: { items: 1 }, 576: { items: 2 }, 768: { items: 3 }, 1200: { items: 5 } }
        });
    } else {
        // If Owl not present, add simple horizontal scroll behavior
        document.querySelectorAll('.owl-featured, .owl-categories').forEach(el => {
            el.style.display = 'flex';
            el.style.gap = '16px';
            el.style.overflowX = 'auto';
            el.style.padding = '8px';
        });
    }
});
</script>
@endpush
                            
@push('scripts')
<script src="{{ asset('front/assets/js/jquery-2.1.0.min.js') }}"></script>
<script src="{{ asset('front/assets/js/popper.js') }}"></script>
<script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/assets/js/custom.js') }}"></script>
@endpush
