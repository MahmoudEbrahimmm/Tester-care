@extends('layouts.dashboard')
@section('title-page', 'صفحة المنتجات')
@section('content')
    <x-breadcrumb title="المنتجات" />
    <a href="{{route('dashboard.products.create')}}" class="btn btn-primary">انشاء منتج</a>
    <div class="container">
        <div class="row">
            @if (session()->has('success'))
                <div class="alert bg-success text-white mb-3 mt-3">{{session('success')}}</div>
            @endif
            <div class="col-md-10 m-auto text-center">
                <table class="table">
                    <thead>
                        <th>الصورة</th>
                        <th>الاسم</th>
                        <th>القسم</th>
                        <th>التاريخ</th>
                        <th colspan="3">العمليات</th>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($products as $product)
                                <td>
                                    @if ($product->image)
                                        <img src="{{ asset('uploads/' . $product->image) }}" width="100"
                                            class="img-thumbnail">
                                    @else
                                        <img src="{{ asset('images/default.png') }}" width="100" class="img-thumbnail">
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name ?? ''}}</td>
                                <td>{{ $product->created_at->format('d-m-y') }}</td>
                                <td>

                                    <a href="{{ route('dashboard.products.show', $product->id) }}" class="btn btn-primary px-2"><i
                                            class="fa-solid fa-eye"></i></a>

                                    <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-success px-2"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                    <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="post"
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



    {{ $products->links() }}
@endsection
