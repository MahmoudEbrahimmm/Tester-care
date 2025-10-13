@extends('layouts.front')

@section('content')
<div class="checkout-page py-5 mt-5" dir="rtl">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-warning text-white text-center py-4 rounded-top-4">
                        <h3 class="mb-0 fw-bold">
                            <i class="fa fa-shopping-bag me-2"></i> إتمام الشراء
                        </h3>
                        <p class="mb-0 small opacity-75">من فضلك أكمل البيانات التالية لتأكيد طلبك</p>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('checkout.store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf

                            <!-- الاسم -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="fa fa-user text-success me-2"></i> الاسم الكامل
                                </label>
                                <input type="text" name="name" class="form-control rounded-pill p-3 shadow-sm" placeholder="أدخل اسمك بالكامل" required>
                            </div>

                            <!-- الهاتف -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="fa fa-phone text-success me-2"></i> رقم الهاتف
                                </label>
                                <input type="text" name="phone" class="form-control rounded-pill p-3 shadow-sm" placeholder="مثال: 0100xxxxxxx" required>
                            </div>

                            <!-- العنوان -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="fa fa-map-marker-alt text-success me-2"></i> العنوان بالتفصيل
                                </label>
                                <textarea name="address" class="form-control rounded-4 p-3 shadow-sm" rows="3" placeholder="اكتب عنوان التوصيل بالتفصيل" required></textarea>
                            </div>

                            <!-- طريقة الدفع -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    <i class="fa fa-credit-card text-success me-2"></i> طريقة الدفع
                                </label>
                                <select name="payment_method" class="form-select rounded-pill p-3 shadow-sm" required>
                                    <option value="">اختر طريقة الدفع</option>
                                    <option value="cash"> الدفع عند الاستلام</option>
                                    <option value="instapay"> انستاباي</option>
                                    <option value="vf-cash"> فودافون كاش</option>
                                </select>
                            </div>

                            <!-- زر التأكيد -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success rounded-pill py-3 fw-bold shadow-sm">
                                    <i class="fa fa-check-circle me-2"></i> تأكيد الطلب الآن
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer bg-light text-center py-3 rounded-bottom-4">
                        <small class="text-muted">
                            <i class="fa fa-lock me-1"></i> جميع بياناتك محمية وآمنة 100%
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== CSS ===== -->
<style>
    body {
        background-color: #f8f9fa !important;
    }

    .checkout-page .card {
        transition: all 0.3s ease;
        border-radius: 20px;
    }

    .checkout-page .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .checkout-page input,
    .checkout-page textarea,
    .checkout-page select {
        border: 1px solid #e0e0e0;
        transition: all 0.3s ease;
    }

    .checkout-page input:focus,
    .checkout-page textarea:focus,
    .checkout-page select:focus {
        border-color: #fdcb6e;
        box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.15);
    }

    .btn-success {
        background: linear-gradient(90deg, #fdcb6e, #f39c12);
        border: none;
    }

    .btn-success:hover {
        background: linear-gradient(90deg, #fdcb6e, #f39c12);
        transform: scale(1.02);
    }

    @media (max-width: 768px) {
        .checkout-page .card {
            border-radius: 15px;
        }

        .checkout-page .card-body {
            padding: 1.5rem !important;
        }

        .checkout-page h3 {
            font-size: 1.4rem;
        }
    }
</style>
@endsection
