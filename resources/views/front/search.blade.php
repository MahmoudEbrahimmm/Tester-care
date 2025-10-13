@extends('layouts.front')

@section('content')
<div class="container my-5 mt-5 pt-5">

    @if(is_numeric($query))
        @if ($spares->count() > 0)
            <div class="row g-5 mt-5">
                @foreach ($spares as $spare)
                    <!-- كارت الجهاز -->
                    <div class="col-md-4 col-sm-6">
                        <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                            <img src="{{ asset('uploads/' . $spare->image) }}"
                                 class="card-img-top rounded-top-4" 
                                 style="max-height: 220px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="fw-bold text-primary mb-2">اسم الجهاز</h5>
                                <p class="mb-1">{{ $spare->device }}</p>
                                <h6 class="fw-bold text-secondary mt-3">حالة الجهاز</h6>
                                <p class="text-muted">{{ $spare->description }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- كارت الفاتورة -->
                    <div class="col-md-6 mx-auto">
                        <div class="card border-0 shadow-lg rounded-4 p-3">
                            <div class="card-body p-5">
                                <div class="text-center mb-4">
                                    <img src="{{ asset('front/assets/images/Test_IT_logo.png') }}" 
                                         class="img-fluid mb-3" 
                                         style="max-width: 130px;">
                                    <hr class="w-50 mx-auto">
                                </div>

                                <div class="mb-3">
                                    <h6 class="fw-bold">اسم العميل:</h6>
                                    <p class="mb-0">{{ $spare->name }}</p>
                                </div>
                                <div class="mb-3">
                                    <h6 class="fw-bold">هاتف الشركة للتواصل:</h6>
                                    <li><a href="https://wa.me/01554866941">015-548-66941</a></li>
                                </div>
                                <div class="mb-3">
                                    <h6 class="fw-bold">عنوان الشركة: </h6>
                                    <p class="mb-0">امتداد شارع جيهان بعد دار الضيافة شارع زهور هولندا</p>
                                </div>

                                <hr>

                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">تكلفة التصليح:</span>
                                    <span>{{ number_format($spare->cost, 2) }} ج.م</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">المبلغ المدفوع:</span>
                                    <span>{{ number_format($spare->paid, 2) }} ج.م</span>
                                </div>
                                <div class="d-flex justify-content-between text-danger fs-5 mt-2">
                                    <span class="fw-bold">المبلغ المتبقي:</span>
                                    <span>{{ number_format($spare->cost - $spare->paid, 2) }} ج.م</span>
                                </div>
                            </div>

                            <div class="card-footer bg-light text-center py-3 rounded-bottom-4">
                                <small class="text-muted">شكراً لاختياركم خدمتنا</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning text-center">لا يوجد نتائج.</div>
        @endif

    
    @else
        @if ($products->count() > 0)
            <div class="row g-4 mt-5">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card border-0 shadow-sm rounded-4 h-100 text-center overflow-hidden d-flex flex-column">
                            <img src="{{ asset('uploads/' . $product->image) }}"
                                 alt="{{ $product->name }}" 
                                 class="card-img-top" 
                                 style="height: 230px; object-fit: cover;">

                            <div class="card-body flex-grow-1">
                                <h5 class="fw-bold text-dark mb-2">{{ $product->name }}</h5>
                                <p class="text-muted small mb-2">{{ Str::limit($product->description, 60) }}</p>
                                <span class="fw-semibold text-success fs-5">{{ $product->price }} ج.م</span>
                            </div>

                            <!-- 👇 الأزرار أسفل الكارت -->
                            <div class="card-footer bg-white border-0 pb-3">
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="{{ route('show.product', $product->slug) }}" 
                                       class="btn btn-outline-primary rounded-circle"
                                       style="width: 45px; height: 45px;">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('add.to.cart', $product->id) }}" 
                                       class="btn btn-outline-success rounded-circle"
                                       style="width: 45px; height: 45px;">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning text-center">لا يوجد منتجات مطابقة للبحث.</div>
        @endif
    @endif
</div>
@endsection

@section('styles')
<style>
.card {
    transition: all 0.3s ease;
}
.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}
.card img {
    transition: transform 0.4s;
}
.card:hover img {
    transform: scale(1.07);
}
@media (max-width: 768px) {
    .card img {
        height: 180px !important;
    }
}
</style>
@endsection
