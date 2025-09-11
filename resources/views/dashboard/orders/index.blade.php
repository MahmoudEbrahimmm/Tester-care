@extends('layouts.dashboard')
@section('page-url', 'صفحة طلبات الزبائن')
@section('content')
    <x-breadcrumb title="طلبات الزبائن" />

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12 m-auto text-center">
                @if (session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>الصورة</th>
                            <th>اسم العميل</th>
                            <th>الهاتف</th>
                            <th>العنوان</th>
                            <th>طريقة الدفع</th>
                            <th>المنتج</th>
                            <th>الكمية</th>
                            <th>السعر</th>
                            <th>الاجمالي</th>
                            <th>التاريخ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>
                                        @if ($item->product->image)
                                            <img src="{{ asset('storage/' . $item->product->image) }}" alt=""
                                                width="80">
                                        @else
                                            لا يوجد صورة
                                        @endif
                                    </td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>
                                        @if ($order->payment_method == 'instapay')
                                            انستاباي
                                        @elseif($order->payment_method == 'vf-cash')
                                            فودافون كاش
                                        @else
                                            الدفع عند الاستلام
                                        @endif
                                    </td>

                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->quantity * $item->price }}</td>
                                    <td>{{ $item->created_at->format('d-m-y h:i A') }}</td>
                                    <td>
                                        <form action="{{route('dashboard.orders.destroy',$order->id)}}" method="POST">
                                            @csrf 
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger px-2"><i
                                                class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
