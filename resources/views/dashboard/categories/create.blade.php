@extends('layouts.dashboard')
@section('title-page', 'انشاء القسم')
@section('content')
    <x-breadcrumb title="انشاء قسم" />

    <div class="container">
        <div class="row">
            <div class="col-md-11 m-auto">
                @if (session()->has('success'))
                    <div class="alert bg-success text-white">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('dashboard.categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="mb-2">اسم القسم</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="parent_id" class="mb-2">القسم الرئيسي</label>
                        <select name="parent_id" id="parent_id"
                            class="form-control @error('parent_id') is-invalid @enderror" value="{{ old('parent_id') }}">
                            <option value="">اختر القسم الرئيسي</option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('parent_id')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="image" class="mb-2">صورة القسم</label>
                        <input type="file" name="image" id="image"
                            class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-5">
                        <label for="description" class="mb-2">وصف القسم</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100">انشاء القسم</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
