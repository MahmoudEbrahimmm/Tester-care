<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الملف الشخصي</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">نظام الإدارة</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('profile.edit') }}">الملف الشخصي</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">تسجيل الخروج</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile Form -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">تعديل الملف الشخصي</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PATCH')

                            <!-- ID (readonly) -->
                            <div class="mb-3">
                                <label class="form-label">رقم المستخدم</label>
                                <input type="text" value="{{ $user->id }}" class="form-control" readonly>
                            </div>

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

                            <!-- Role -->
                            <div class="mb-3">
                                <label class="form-label">الصلاحية</label>
                                <select name="role" class="form-select">
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>مدير</option>
                                    <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>موظف</option>
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>مستخدم</option>
                                </select>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label">كلمة المرور (اتركها فارغة إذا لم ترد التغيير)</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <!-- Created & Updated At -->
                            <div class="mb-3">
                                <label class="form-label">تاريخ الإنشاء</label>
                                <input type="text" value="{{ $user->created_at }}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">آخر تحديث</label>
                                <input type="text" value="{{ $user->updated_at }}" class="form-control" readonly>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">💾 حفظ التغييرات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
