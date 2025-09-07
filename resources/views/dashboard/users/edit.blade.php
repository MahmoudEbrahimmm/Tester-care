@extends('layouts.dashboard')

@section('title-page', 'تعديل بيانات المستخدم')

@section('content')
<x-breadcrumb title="تعديل بيانات: {{ $user->name }}" />

<div class="card-body p-4">
    <form method="POST" action="{{ route('dashboard.users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-3">
            <label class="form-label">الاسم</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">البريد الإلكتروني</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>

        <!-- Phone -->
        <div class="mb-3">
            <label class="form-label">رقم الهاتف</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
        </div>

        <!-- National -->
        <div class="mb-3">
            <label class="form-label">الرقم القومي</label>
            <input type="text" name="national" value="{{ old('national', $user->national) }}" class="form-control" maxlength="14">
        </div>

        <!-- Address -->
        <div class="mb-3">
            <label class="form-label">العنوان</label>
            <input type="text" name="address" value="{{ old('address', $user->address) }}" class="form-control">
        </div>

        <!-- Role -->
        <div class="mb-3">
            <label class="form-label">الصلاحية</label>
            <select name="role" class="form-select">
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>مدير</option>
                <option value="staff" {{ old('role', $user->role) == 'staff' ? 'selected' : '' }}>موظف</option>
                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>مستخدم</option>
            </select>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="form-label">كلمة المرور</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">تأكيد كلمة المرور</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-success w-25 me-3"> تحديث المستخدم</button>
            <a href="{{route('dashboard.users.index')}}" class="btn btn-secondary w-25">الغاء</a>
        </div>
    </form>
</div>
@endsection
