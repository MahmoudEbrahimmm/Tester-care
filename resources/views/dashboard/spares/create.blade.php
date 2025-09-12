@extends('layouts.dashboard')
@section('title-page', 'اضافة جهاز للصيانه')
@section('content')
    <x-breadcrumb title="اضافة جهاز للصيانه" />

    <div class="card-body p-4">
        {{-- عرض كل الأخطاء في Alert فوق --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('dashboard.spares.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">اسم العميل</label>
                <input type="text" name="name"
                       value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label class="form-label">رقم الهاتف</label>
                <input type="text" name="phone"
                       value="{{ old('phone') }}"
                       class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label class="form-label">عنوان العميل</label>
                <input type="text" name="address"
                       value="{{ old('address') }}"
                       class="form-control @error('address') is-invalid @enderror">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Device -->
            <div class="mb-3">
                <label class="form-label">اسم الجهاز</label>
                <input type="text" name="device"
                       value="{{ old('device') }}"
                       class="form-control @error('device') is-invalid @enderror" required>
                @error('device')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label">مشكلة الجهاز</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Cost -->
            <div class="mb-3">
                <label class="form-label">تكلفة التصليح</label>
                <input type="number" name="cost"
                       value="{{ old('cost') }}"
                       class="form-control @error('cost') is-invalid @enderror">
                @error('cost')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Paid -->
            <div class="mb-3">
                <label class="form-label">المبلغ المدفوع</label>
                <input type="number" name="paid"
                       value="{{ old('paid') }}"
                       class="form-control @error('paid') is-invalid @enderror">
                @error('paid')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image -->
            <div class="mb-3">
                <label class="form-label">صورة الجهاز</label>
                <input type="file" name="image"
                       class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-lg">إضافة</button>
            </div>
        </form>
    </div>
@endsection
