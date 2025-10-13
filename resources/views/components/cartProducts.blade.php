@if (session('cart') && count(session('cart')) > 0)
    <div id="cartProducts" class="mt-5" dir="rtl">
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle shadow-sm rounded-3 text-center">
                <thead class="table-info text-dark">
                    <tr>
                        <th>الصورة</th>
                        <th>المنتج</th>
                        <th>السعر</th>
                        <th style="width: 280px;">الكمية</th>
                        <th>المجموع</th>
                        <th>إزالة</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach (session('cart') as $key => $value)
                        @php $total += $value['price'] * $value['quantity']; @endphp
                        <tr data-id="{{ $key }}">
                            <td>
                                <img src="{{ asset('uploads/' . $value['image']) }}"
                                     class="rounded-3 shadow-sm border" 
                                     alt="{{ $value['name'] }}" 
                                     style="width: 90px; height: 90px; object-fit: cover;">
                            </td>
                            <td class="fw-semibold">{{ $value['name'] }}</td>
                            <td class="text-success fw-bold">{{ $value['price'] }} ج.م</td>
                            <td>
                                <input type="number" 
                                       class="form-control text-center quantity w-50 mx-auto shadow-sm" 
                                       value="{{ $value['quantity'] }}" 
                                       min="1">
                            </td>
                            <td class="fw-bold text-primary">{{ $value['price'] * $value['quantity'] }} ج.م</td>
                            <td>
                                <button class="btn btn-sm btn-outline-danger remove-from-cart rounded-circle shadow-sm" 
                                        title="حذف المنتج">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- الإجمالي + الأزرار -->
        <div class="d-flex justify-content-between align-items-center flex-wrap mt-4 p-3 bg-light rounded-3 shadow-sm">
            <h4 class="fw-bold m-0 text-dark">
                الإجمالي: 
                <span id="cartTotal" class="text-success">{{ $total }} ج.م</span>
            </h4>
            <div class="d-flex gap-2 mt-3 mt-md-0">
                <a href="{{ route('home') }}" 
                   class="btn btn-outline-secondary btn-lg px-4 shadow-sm d-flex align-items-center gap-2">
                    <i class="fa fa-shopping-bag"></i> تسوق
                </a>
                <a href="{{ route('checkout') }}" 
                   class="btn btn-primary btn-lg px-4 shadow-sm d-flex align-items-center gap-2">
                    <i class="fa fa-credit-card"></i> شراء
                </a>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info text-center mt-5 shadow-sm rounded-3">
        <h5 class="mb-0">السلة فارغة حالياً</h5>
    </div>
    <a href="{{ route('home') }}" 
       class="btn btn-outline-primary btn-lg px-4 shadow-sm w-100 mt-3 d-flex align-items-center justify-content-center gap-2">
        <i class="fa fa-shopping-cart"></i> تسوق
    </a>
@endif
