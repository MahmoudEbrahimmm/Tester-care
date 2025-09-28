<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل الدخول</title>
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #1f2937; /* bg-gray-900 */
      color: #ffffff;
    }
    .form-container {
      background-color: #2d3748; /* bg-gray-800 */
      border-radius: 0.75rem;
      box-shadow: 0 10px 15px rgba(0,0,0,0.3);
      padding: 2rem;
      max-width: 400px;
      width: 100%;
    }
    .form-control:focus {
      box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.5);
      border-color: #3b82f6;
    }
    a {
      color: #60a5fa;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100">

  <div class="form-container">
    <h2 class="text-center mb-4 fw-bold">تسجيل الدخول</h2>

    @if(session('error'))
      <div class="text-danger mb-2">{{ session('error') }}</div>
    @endif

    <form action="{{ route('login') }}" method="POST">
      @csrf

      <!-- البريد الإلكتروني -->
      <div class="mb-3">
        <label for="email" class="form-label">البريد الإلكتروني</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control bg-dark text-white border-secondary" required autofocus>
        @error('email')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>

      <!-- كلمة المرور -->
      <div class="mb-3">
        <label for="password" class="form-label">كلمة المرور</label>
        <input type="password" id="password" name="password" class="form-control bg-dark text-white border-secondary" required>
        @error('password')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>

      <!-- تذكرني -->
      <div class="form-check mb-3">
        <input type="checkbox" name="remember" id="remember" class="form-check-input">
        <label for="remember" class="form-check-label text-white">تذكرني</label>
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-primary w-100">تسجيل الدخول</button>
      </div>

      <p class="mt-3 text-center small">
        لا تملك حساب؟ <a href="{{ route('register') }}">انشاء حساب جديد</a>
      </p>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
