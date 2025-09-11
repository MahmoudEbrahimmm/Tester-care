@extends('layouts.dashboard')
@section('content')
    <main>
        <x-breadcrumb title="لوحة التحكم" />
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">إجمالي عدد المستخدمين: {{ \App\Models\User::count() }} </div>
                        <div class="card-footer"><a href="{{ route('dashboard.users.index') }}" class="nav-link">عرض الجدول</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">إجمالي عدد الأقسام: {{ \App\Models\Category::count() }} </div>
                        <div class="card-footer"><a href="{{ route('dashboard.categories.index') }}" class="nav-link">عرض
                                الجدول</a></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body"> إجمالي عدد المنتجات: {{ \App\Models\Product::count() }} </div>
                        <div class="card-footer"><a href="{{ route('dashboard.categories.index') }}" class="nav-link">عرض
                                الجدول</a></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body"> إجمالي عدد الاوردرات: {{ \App\Models\Order::count() }} </div>
                        <div class="card-footer"><a href="{{ route('dashboard.orders.index') }}" class="nav-link">عرض
                                الجدول</a></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body"> إجمالي عدد الرسائل: {{ \App\Models\Contact::count() }} </div>
                        <div class="card-footer"><a href="{{ route('dash.contact') }}" class="nav-link">عرض الجدول</a></div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fa-solid fa-comments me-1"></i>
                                رسائل العملاء
                            </div>
                            <div class="card-body">
                                <div width="100%" height="40">
                                    <table class="table text-center">
                                        <tbody>
                                            @foreach ($messages as $contact)
                                                <tr>
                                                    <td>{{ $contact->name }} :</td>
                                                    <td>{{ $contact->description }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fa-solid fa-cart-flatbed me-1"></i>
                                طلبات الزبائن
                            </div>
                            <div class="card-body">
                                <div width="100%" height="40">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                {{-- <th>الصورة</th> --}}
                                                {{-- <th>اسم العميل</th> --}}
                                                {{-- <th>المنتج</th> --}}
                                                {{-- <th>الكمية</th>
                                                <th>السعر</th> --}}
                                                {{-- <th>الاجمالي</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                @foreach ($order->items as $item)
                                                    <tr>
                                                        <td>
                                                            @if ($item->product->image)
                                                                <img src="{{ asset('storage/' . $item->product->image) }}"
                                                                    alt="" width="60">
                                                            @else
                                                                لا يوجد صورة
                                                            @endif
                                                        </td>
                                                        <td>{{ $order->name }}</td>
                                                        <td>{{ $item->product->name }}</td>
                                                        {{-- <td>{{ $item->quantity }}</td>
                                                        <td>{{ $item->price }}</td>  --}}
                                                        <td>{{ $item->quantity * $item->price }}</td>

                                                        
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
    </main>
@endsection
