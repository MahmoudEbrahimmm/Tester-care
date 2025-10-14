<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>إنشاء حساب جديد</title>
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #fff, #e67e22);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Tajawal', sans-serif;
    }

    .auth-card {
      background-color: #fff;
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      padding: 2.5rem 2rem;
      width: 100%;
      max-width: 600px;
      transition: transform 0.3s ease;
    }

    .auth-card:hover {
      transform: translateY(-5px);
    }

    .auth-title {
      color: #e67e22;
      font-weight: 700;
      margin-bottom: 1.5rem;
    }

    .form-label {
      font-weight: 600;
    }

    .form-control {
      border-radius: 0.5rem;
      border: 1px solid #ddd;
      transition: all 0.2s ease;
    }

    .form-control:focus {
      border-color: #f39c12;
      box-shadow: 0 0 0 0.2rem rgba(243, 156, 18, 0.25);
    }

    .btn-register {
      background-color: #f39c12;
      border: none;
      font-weight: 600;
      color: #fff;
      border-radius: 0.5rem;
      transition: background 0.3s ease;
    }

    .btn-register:hover {
      background-color: #e67e22;
    }

    a {
      color: #e67e22;
      text-decoration: none;
      font-weight: 500;
    }

    a:hover {
      text-decoration: underline;
    }

    .text-danger.small {
      font-size: 0.85rem;
    }
  </style>
</head>

<body>
  <div class="auth-card">
    <h2 class="text-center auth-title">إنشاء حساب جديد</h2>

    @if(session('error'))
      <div class="alert alert-danger text-center py-2">{{ session('error') }}</div>
    @endif

    <form action="{{ route('register') }}" method="POST">
      @csrf
      <div class="row g-3">
        <!-- الاسم -->
        <div class="col-12">
          <label for="name" class="form-label">الاسم الكامل</label>
          <input type="text" id="name" name="name" value="{{ old('name') }}" 
                 class="form-control" required autofocus>
          @error('name')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- البريد الإلكتروني -->
        <div class="col-md-6">
          <label for="email" class="form-label">البريد الإلكتروني</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" 
                 class="form-control" required>
          @error('email')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- رقم الهاتف -->
        <div class="col-md-6">
          <label for="phone" class="form-label">رقم الهاتف</label>
          <input type="text" id="phone" name="phone" value="{{ old('phone') }}" 
                 class="form-control" required>
          @error('phone')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- كلمة المرور -->
        <div class="col-md-6">
          <label for="password" class="form-label">كلمة المرور</label>
          <input type="password" id="password" name="password" 
                 class="form-control" required>
          @error('password')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- تأكيد كلمة المرور -->
        <div class="col-md-6">
          <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
          <input type="password" id="password_confirmation" name="password_confirmation" 
                 class="form-control" required>
        </div>
      </div>

      <!-- زر الإنشاء -->
      <div class="d-grid mt-4">
        <button type="submit" class="btn btn-register py-2">إنشاء الحساب</button>
      </div>

      <p class="mt-3 text-center small">
        لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a>
      </p>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
