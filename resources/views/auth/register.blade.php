<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>انشاء حساب جديد</title>
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #1f2937; /* bg-gray-900 equivalent */
      color: #ffffff;
    }
    .form-container {
      background-color: #2d3748; /* bg-gray-800 equivalent */
      border-radius: 0.75rem;
      box-shadow: 0 10px 15px rgba(0,0,0,0.3);
      padding: 2rem;
      max-width: 600px;
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
    <h2 class="text-center mb-4 fw-bold">انشاء حساب جديد</h2>

    @session('error')
      <div class="text-danger mb-2">{{ session('error') }}</div>
    @enderror

    <form action="{{ url('register') }}" method="POST">
      @csrf
      <div class="row g-3">
        <div class="col-12">
          <label for="name" class="form-label">الاسم</label>
          <input type="text" id="name" name="name" autofocus autocomplete="name" value="{{ old('name') }}" class="form-control bg-dark text-white border-secondary">
          @error('name')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
          <label for="email" class="form-label">البريد الالكتروني</label>
          <input type="email" id="email" name="email" autocomplete="off" value="{{ old('email') }}" class="form-control bg-dark text-white border-secondary">
          @error('email')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
          <label for="phone" class="form-label">الهاتف</label>
          <input type="text" id="phone" name="phone" autocomplete="off" value="{{ old('phone') }}" class="form-control bg-dark text-white border-secondary">
          @error('phone')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
          <label for="password" class="form-label">كلمة المرور</label>
          <input type="password" id="password" name="password" autocomplete="new-password" class="form-control bg-dark text-white border-secondary">
          @error('password')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
          <label for="confirm-password" class="form-label">تاكيد كلمة المرور</label>
          <input type="password" id="confirm-password" name="password_confirmation" autocomplete="new-password" class="form-control bg-dark text-white border-secondary">
        </div>
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-primary w-100">انشاء</button>
      </div>

      <p class="mt-3 text-center small">
        هل لديك حساب من قبل؟ <a href="{{ route('login') }}">تسجيل الدخول</a>
      </p>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>     