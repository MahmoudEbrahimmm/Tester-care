@extends('layouts.dashboard')
@section('title-page','صفحة عرض المنتج')
@section('content')
<x-breadcrumb title="{{$item->name}}" />
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-auto text-center mt-3">
                <h4 class="mb-5">عرص تفاصيل المنتج</h4>
                <table class="table">
                    <thead>
                        <th>الصورة</th>
                        <th>ID</th>
                        <th>الاسم</th>
                        <th>القسم</th>
                        <th>السعر</th>
                        <th>الوصف</th>
                        <th>المخزون</th>
                        <th>الانشاء</th>
                        <th> التحديث</th>
                        <th>العمليات</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" width="150" class="img-thumbnail">
                                @else
                                    <img src="{{ asset('images/default.png') }}" width="150" class="img-thumbnail">
                                @endif
                            </td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name ?? ''}}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td><a href="{{ route('dashboard.products.index') }}" class="btn btn-primary px-2"><i class="fa-solid fa-house"></i></a></td>
                        
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection