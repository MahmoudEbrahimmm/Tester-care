@if (session('cart') && count(session('cart')) > 0)
    <div id="cartProducts">
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle shadow-lg rounded-3 wow fadeInUp"
                data-wow-delay="0.5s">
                <thead class="table-info">
                    <tr>
                        <th>الصورة</th>
                        <th>المنتج</th>
                        <th>السعر</th>
                        <th style="width: 200px;">الكمية</th>
                        <th>المجموع</th>
                        <th style="width: 30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach (session('cart') as $key => $value)
                        @php $total += $value['price'] * $value['quantity']; @endphp
                        <tr data-id="{{ $key }}">
                            <td><img src="{{ asset('storage/' . $value['image']) }}" class="rounded shadow-sm"
                                    alt="Product" style="width: 100px;"></td>
                            <td>{{ $value['name'] }}</td>
                            <td>{{ $value['price'] }} ج.م</td>
                            <td>
                                <input type="number" class="form-control text-center w-50 mx-auto quantity"
                                    value="{{ $value['quantity'] }}">
                            </td>
                            <td>{{ $value['price'] * $value['quantity'] }} ج.م</td>
                            <td>
                                <button class="btn remove-from-cart">❌</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4 wow fadeInUp" data-wow-delay="0.9s">
            <h4 class="fw-bold">الإجمالي: 
                <span id="cartTotal" class="text-success">{{ $total }} ج.م</span>
            </h4>
            <div>
                <a href="{{ route('home') }}"
                    class="btn btn-secondary btn-lg px-4 shadow-lg animate__animated animate__pulse animate__infinite">تسوق</a>
                <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg px-4 shadow-lg">شراء</a>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info text-center mt-5"><h5>السلة فارغة حاليا</h5></div>
    <a href="{{ route('home') }}"
        class="btn btn-secondary btn-lg px-4 shadow-lg animate__animated animate__pulse animate__infinite w-100">تسوق</a>
@endif
