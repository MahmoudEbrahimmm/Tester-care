@extends('layouts.dashboard')
@section('title-page', 'صفحة الاقسام')


@section('content')
    <x-breadcrumb title="الاقسام" />
    <h3><a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary">انشاء قسم</a></h3>
    <div class="container">
        <div class="row">
            @if (session()->has('success'))
                <div class="alert bg-success text-white mb-3 mt-3">{{session('success')}}</div>
            @endif
            <div class="col-md-10 m-auto text-center">
                <table class="table">
                    <thead>
                        <th>الصوره</th>
                        <th>الاسم</th>
                        <th>القسم</th>
                        <th>التاريخ</th>
                        <th colspan="3">العمليات</th>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($categories as $category)
                                <td>
                                    @if ($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" width="100"
                                            class="img-thumbnail">
                                    @else
                                        <img src="{{ asset('images/default.png') }}" width="100" class="img-thumbnail">
                                    @endif
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->parent->name }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    <a href="{{route('dashboard.categories.show',$category->id)}}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>

                                    <a href="{{route('dashboard.categories.edit',$category->id)}}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>

                                    <form action="{{route('dashboard.categories.destroy',$category->id)}}" method="post" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    {{ $categories->withQueryString()->links() }}


@endsection
