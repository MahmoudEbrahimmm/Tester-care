@extends('layouts.front')
@section('content')

<div class="container my-5 mt-5 pt-5">

    @if ($spares->count() > 0)
        <div class="row g-5">
            @foreach ($spares as $spare)
                <!-- كارت الجهاز -->
                <div class="col-md-4 col-sm-6">
                    <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                        <img src="{{ asset('storage/' . $spare->image) }}" 
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
                                <p class="mb-0"> امتداد شارع جيهان بعد دار الضيافه شارع زهور هولندا</p>
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

</div>

@endsection
