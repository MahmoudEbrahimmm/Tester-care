@extends('layouts.front')

@section('page-url', 'المنتجات')

@section('content')
    <div class="container py-5">
        <div class="container mb-5" dir="rtl">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading lh-lg fs-6" style="text-align: right;">
                        <h2 class="mb-3" style="text-align: right;">المنتجات</h2>
                        <p style="text-align: right;">
                            تقدم شركتنا مجموعة واسعة من المنتجات الإلكترونية عالية الجودة لتلبية كافة احتياجات
                            عملائنا. تشمل منتجاتنا
                            <strong>أجهزة اللابتوب والشاشات الحديثة</strong> بمواصفات متنوعة وأسعار تنافسية،
                            بالإضافة إلى <strong>الإكسسوارات الأصلية والمميزة</strong> مثل الكابلات، الحقائب،
                            والفأرات ولوحات المفاتيح. كما نوفر منتجات مستوردة بعناية لضمان أعلى معايير الجودة
                            والأداء. هدفنا هو توفير كل ما يحتاجه العملاء لتجربة استخدام مثالية تجمع بين الكفاءة،
                            المتانة، والتصميم العصري.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4 mt-3">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card h-100 shadow-sm">
                        <!-- صورة المنتج -->
                        <img src="{{ $product->image ? asset('uploads/' . $product->image) : asset('front/assets/images/no-image.png') }}"
                            class="card-img-top" alt="{{ $product->name }}" style="height: 250px; object-fit: cover;">

                        <!-- تفاصيل المنتج -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted mb-2">
                                {{ number_format($product->price, 2) }} ج.م
                            </p>

                            <!-- أزرار -->
                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ route('show.product', $product->slug) }}" class="btn btn-secondary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-secondary text-white">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{-- {{ $products->links() }} --}}
        </div>
    </div>
@endsection

@push('scripts')
    <!-- مكتبات JS -->
    <script src="{{ asset('front/assets/js/jquery-2.1.0.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/popper.js') }}"></script>
    <script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/custom.js') }}"></script>
@endpush
