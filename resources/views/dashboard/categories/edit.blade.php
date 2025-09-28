@extends('layouts.dashboard')
@section('title-page', 'تحديث القسم')
@section('content')
    <x-breadcrumb title="تحديث قسم" />

    <div class="container">
        <div class="row">
            <div class="col-md-11 m-auto">
                @if (session()->has('success'))
                    <div class="alert bg-success text-white">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('dashboard.categories.update', $category->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="mb-2">اسم القسم</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') ?? $category->name }}">
                    </div>
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="parent_id" class="mb-2">القسم الرئيسي</label>
                        <select name="parent_id" id="parent_id"
                            class="form-control @error('parent_id') is-invalid @enderror"
                            value="{{ old('parent_id') ?? $category->parent_id }} }}">
                            <option value="">اختر القسم الرئيسي</option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}" @selected($category->parent_id == $parent->id)>{{ $parent->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('parent_id')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        @if ($category->image)
                            <img src="{{ asset('uploads/' . $category->image) }}" alt="" height="80">
                        @endif
                        
                        
                        <input type="file" name="image" id="image"
                            class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-5">
                        <label for="description" class="mb-2">وصف القسم</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') ?? $category->description }}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-25">تحديث القسم</button>
                        <a href="{{route('dashboard.categories.index')}}" class="btn btn-secondary w-25">تراجع</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
