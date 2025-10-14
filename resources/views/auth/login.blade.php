<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل الدخول</title>
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
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      padding: 2.5rem 2rem;
      width: 100%;
      max-width: 420px;
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

    .btn-login {
      background-color: #f39c12;
      border: none;
      font-weight: 600;
      color: #fff;
      border-radius: 0.5rem;
      transition: background 0.3s ease;
    }

    .btn-login:hover {
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
  
.form-check-input:focus {
  outline: none;
  box-shadow: 0 0 0 0.2rem rgba(243, 156, 18, 0.5);
  border-color: #f39c12;
  background-color: #f39c12;
}
.form-check-input:checked {
  background-color: #f39c12;
  border-color: #f39c12;
}
.form-check-input:not(:checked):not(:focus) {
  background-color: #fff;
  border-color: #ddd;
}

  </style>
</head>

<body>
  <div class="auth-card">
    <h2 class="text-center auth-title">تسجيل الدخول</h2>

    @if(session('error'))
      <div class="alert alert-danger text-center py-2">{{ session('error') }}</div>
    @endif

    <form action="{{ route('login') }}" method="POST">
      @csrf

      <!-- البريد الإلكتروني -->
      <div class="mb-3">
        <label for="email" class="form-label">البريد الإلكتروني</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
               class="form-control" required autofocus>
        @error('email')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>

      <!-- كلمة المرور -->
      <div class="mb-3">
        <label for="password" class="form-label">كلمة المرور</label>
        <input type="password" id="password" name="password" class="form-control" required>
        @error('password')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>

      <!-- تذكرني -->
      <div class="form-check mb-3">
        <input type="checkbox" name="remember" id="remember" class="form-check-input">
        <label for="remember" class="form-check-label">تذكرني</label>
      </div>

      <!-- زر الدخول -->
      <div class="d-grid mt-4">
        <button type="submit" class="btn btn-login py-2">تسجيل الدخول</button>
      </div>

      <p class="mt-3 text-center small">
        لا تملك حساب؟ <a href="{{ route('register') }}">إنشاء حساب جديد</a>
      </p>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
