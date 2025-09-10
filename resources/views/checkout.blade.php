@extends('layouts.front')

@section('content')
<div class="container py-5 mt-5">
    <h2 class="mb-4 text-center fw-bold">إتمام الشراء</h2>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">الاسم</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">العنوان</label>
            <textarea name="address" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">طريقة الدفع</label>
            <select name="payment_method" class="form-control" required>
                <option value="cash">الدفع عند الاستلام</option>
                <option value="instapay">انستاباي</option>
                <option value="vf-cash">فودافون كاش</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success w-100">تأكيد الطلب</button>
    </form>
</div>
@endsection
