@extends('layouts.dashboard')
@section('page-url', 'تفاصيل جهاز العميل')
@section('content')
    <x-breadcrumb title="{{ $spare->name }}" />

    <div class="container">
        <div class="row">
            <div class="col-md-12 m-auto text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>صورة</th>
                            <th>الرقم</th>
                            <th>اسم العميل</th>
                            <th>هاتفه</th>
                            <th>عنوانه</th>
                            <th>اسم الجهاز</th>
                            <th>المشكلة</th>
                            <th>التكلفة</th>
                            <th>المدفوع</th>
                            <th>المتبقي</th>
                            <th>الانشاء</th>
                            <th>التحديث</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                @if ($spare->image)
                                    <img src="{{ asset('storage/' . $spare->image) }}" alt="صورة الجهاز" 
                                        style="width: 450px;" class="img-thumbnail">
                                @else
                                    
                                @endif
                            </td>

                            <td>{{ $spare->id }}</td>
                            <td>{{ $spare->name }}</td>
                            <td>{{ $spare->phone }}</td>
                            <td>{{ $spare->address }}</td>
                            <td>{{ $spare->device }}</td>
                            <td>{{ $spare->description }}</td>
                            <td>{{ $spare->cost }}</td>
                            <td>{{ $spare->paid }}</td>
                            <td>{{ $spare->cost - $spare->paid }}</td>
                            <td>{{ $spare->created_at->format('d-m-y h:i A') }}</td>
                            <td> {{ $spare->updated_at ? $spare->updated_at->format('d-m-y h:i A') : '' }}</td>
                            <td>
                                <a href="{{ route('dashboard.spares.index') }}" class="btn btn-primary"><i
                                        class="fa-solid fa-home"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
