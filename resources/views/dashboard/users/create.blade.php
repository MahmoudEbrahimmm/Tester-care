@extends('layouts.dashboard')
@section('title-page', 'اضافة موظف جديد')
@section('content')
    <x-breadcrumb title="اضافة موظف" />

    <div class="card-body p-4">
        <form method="POST" action="{{ route('dashboard.users.store') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">الاسم</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label class="form-label">رقم الهاتف</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
            </div>

            <!-- National -->
            <div class="mb-3">
                <label class="form-label">الرقم القومي</label>
                <input type="text" name="national" value="{{ old('national') }}" class="form-control" maxlength="14">
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label class="form-label">العنوان</label>
                <input type="text" name="address" value="{{ old('address') }}" class="form-control">
            </div>

            <!-- Role -->
            <div class="mb-3">
                <label class="form-label">الصلاحية</label>
                <select name="role" class="form-select">
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>مدير</option>
                    <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>موظف</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>مستخدم</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">كلمة المرور</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>


            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-lg">إضافة المستخدم</button>
            </div>
        </form>
    </div>


@endsection
