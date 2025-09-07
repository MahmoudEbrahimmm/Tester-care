@extends('layouts.dashboard')
@section('title-page', 'صفحة انشاء المنتج')
@section('content')
    <x-breadcrumb title="انشاء المنتج" />

    <div class="container">
        <div class="row">
            <div class="col-md-11 m-auto">
                @if (session()->has('success'))
                    <div class="alert bg-success text-white">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')


                    <div class="mb-3">
                        <label for="name" class="mb-2">اسم المنتج</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $product->name) }}">
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="mb-2">القسم الرئيسي</label>
                        <select name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">اختر القسم الرئيسي</option>
                            @foreach ($parents as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="file" name="image" id="image"
                            class="form-control @error('image') is-invalid @enderror">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="صورة المنتج" width="100"
                                class="mt-2">
                        @endif
                    </div>

                    <div class="mb-5">
                        <label for="description" class="mb-2">وصف المنتج</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="mb-5">
                        <label for="price" class="mb-2">سعر المنتج</label>
                        <input type="number" name="price" id="price" step="0.01" min="0"
                            class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price', $product->price) }}">
                    </div>

                    <div class="mb-5">
                        <label for="stock" class="mb-2">المخزون</label>
                        <input type="number" name="stock" id="stock" step="1" min="0"
                            class="form-control @error('stock') is-invalid @enderror"
                            value="{{ old('stock', $product->stock) }}">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-25">تحديث بيانات المنتج</button>
                        <a href="{{ route('dashboard.products.index') }}" class="btn btn-secondary w-25">إلغاء</a>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
