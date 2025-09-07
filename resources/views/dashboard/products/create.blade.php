@extends('layouts.dashboard')
@section('title-page','صفحة انشاء المنتج')
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
                <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="mb-2">اسم المنتج</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="category_id" class="mb-2">المنتج الرئيسي</label>
                        <select name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror" value="{{ old('category_id') }}">
                            <option value="">اختر المنتج الرئيسي</option>
                            @foreach ($parents as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="image" class="mb-2">صورة المنتج</label>
                        <input type="file" name="image" id="image"
                            class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-5">
                        <label for="description" class="mb-2">وصف المنتج</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-5">
                        <label for="price" class="mb-2">سعر المنتج</label>
                        <input type="numper" name="price" id="price" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-5">
                        <label for="stock" class="mb-2">المخزون</label>
                        <input type="numper" name="stock" id="stock" step="1" min="0" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}">
                    </div>
                    @error('stock')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100">انشاء المنتج</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection