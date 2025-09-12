@extends('layouts.dashboard')
@section('page-url','الاجهزه المطلوب صيانتها');
@section('content')
<x-breadcrumb title="صيانة اجهزة العملاء" />
    <a href="{{route('dashboard.spares.create')}}" class="btn btn-info">اضافة جهاز جديد</a>

<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto text-center">
            <h3 class="btn-3">صفحة الصيانه</h3>
            @if (session()->has('success'))
                <div class="alert bg-success text-white mb-3 mt-3">{{session('success')}}</div>
            @endif
            <table class="table text-center">
                <thead>
                    <tr>
                    <th>رقم الجهاز</th>
                    <th>اسم العميل</th>
                    <th>جهاز العميل</th>
                    <th>المبلغ المتبقي</th>
                    <th>التاريخ</th>
                    <th colspan="3">العمليات</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($spares as $spare)
                    <tr>
                        <td> {{$spare->id}} </td>
                        <td> {{$spare->name}} </td>
                        <td> {{$spare->device}} </td>
                        <td class="bg-secondary text-white"> {{$spare->cost - $spare->paid}} </td>
                        <td> {{$spare->created_at->format('d-m-y')}}</td>
                        <td>
                            <a href="{{ route('dashboard.spares.show', $spare->id) }}" class="btn btn-primary px-2"><i
                                            class="fa-solid fa-eye"></i></a>

                                    <a href="{{ route('dashboard.spares.edit', $spare->id) }}" class="btn btn-success px-2"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                    <form action="{{ route('dashboard.spares.destroy', $spare->id) }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger px-2"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    {{ $spares->links() }}

@endsection