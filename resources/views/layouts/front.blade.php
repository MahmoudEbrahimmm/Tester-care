<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>@yield('page-url', 'الصفحة الرئيسية')</title>
    <link rel="icon" href="{{ asset('front/assets/images/Test_IT_logo.png') }}">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/templatemo-hexashop.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/lightbox.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @stack('styles')
        <link rel="stylesheet" href="{{ asset('front/assets/css/tester.css') }}">

</head>

<body>

<!-- ***** Header Area Start ***** -->
<header class="header-area shadow-sm text-white" style="background-color: #f39c12 !important; color: #fff !important;" dir="rtl">

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- الشعار -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('front/assets/images/Test_IT_logo.png') }}" alt="Logo" style="width:120px;">
            </a>

            <!-- زرار الموبايل -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <!-- القائمة الرئيسية -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-end" dir="rtl">
                    @if (Auth::user() && Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">لوحة التحكم</a>
                        </li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#top">الرئيسية</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#men">المنتجات</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#women">قطع الغيار</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#kids">الأقسام</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#contact">تواصل معنا</a></li>

                    <!-- الصفحات -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            الصفحات
                        </a>
                        <ul class="dropdown-menu text-end" aria-labelledby="pagesDropdown" dir="rtl">
                            <li><a class="dropdown-item" href="{{ route('products') }}">كل المنتجات</a></li>
                            <li><a class="dropdown-item" href="{{ route('about') }}">من نحن</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- قائمة أيقونات الحساب، السلة، البحث -->
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- السلة -->
                    <li class="nav-item dropdown">
                        <a class="nav-link position-relative" href="#" id="cartDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="badge bg-warning position-absolute top-0 start-100 translate-middle">
                                {{ count(session('cart', [])) }}
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-3" aria-labelledby="cartDropdown"
                            style="min-width:250px;">
                            @if (session('cart', []))
                                @foreach (session('cart', []) as $value)
                                    <li class="d-flex align-items-center mb-2">
                                        <img src="{{ asset('uploads/' . $value['image']) }}" alt=""
                                            width="40" class="me-2 rounded">
                                        <div>
                                            <strong>{{ $value['name'] }}</strong><br>
                                            <small>الكمية: {{ $value['quantity'] }} | السعر:
                                                {{ $value['price'] }}</small>
                                        </div>
                                    </li>
                                @endforeach
                                <li><a href="{{ route('cart') }}" class="btn btn-sm btn-primary w-100">عرض الكل</a></li>
                            @else
                                <li class="text-center">السلة فارغة</li>
                            @endif
                        </ul>
                    </li>

                    <!-- البحث -->
                    <li class="nav-item mx-2 d-lg-none"> <!-- يظهر فقط على الموبايل -->
                        <a href="#" class="nav-link" id="mobileSearchToggle"><i class="fa fa-search"></i></a>
                    </li>
                    <form action="{{ route('products.search') }}" method="GET"
                        class="d-none position-absolute bg-white p-2 shadow rounded" id="mobileSearchForm"
                        style="top:50px; right:10px; z-index:1000; width: 200px;">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control"
                                placeholder="ابحث عن منتج..." required>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </form>

                    <!-- الحساب -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-user"></i> {{ Auth::user()->name ?? 'حسابي' }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('login') }}">تسجيل الدخول</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">إنشاء حساب</a></li>
                            @if (Auth::check())
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">تسجيل الخروج</button>
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </li>
                </ul>
                
            </div>
        </nav>
    </div>
</header>
<!-- ***** Header Area End ***** -->
<script>
    document.getElementById('mobileSearchToggle').addEventListener('click', function(e) {
        e.preventDefault();
        const form = document.getElementById('mobileSearchForm');
        form.classList.toggle('d-none');
    });
</script>



    <div class="mt-5">
        @yield('content')
    </div>



<!-- ***** Footer Start ***** -->
<footer class="bg-light text-dark pt-5 mt-5 border-top shadow-sm" dir="rtl">
  <div class="container">
    <div class="row text-center text-md-start gy-4">

      <!-- Logo -->
      <div class="col-lg-3 col-md-6">
        <div class="mb-3">
          <img src="{{ asset('front/assets/images/Test_IT_logo.png') }}" alt="Logo" style="width: 130px;">
        </div>
        <p class="text-muted small">
          شركة <strong class="text-primary">Tester</strong> لصيانة وبيع الأجهزة الإلكترونية الأصلية بأفضل الأسعار.
        </p>
      </div>

      <!-- الوصول إلينا -->
      <div class="col-lg-3 col-md-6">
        <h5 class="fw-bold text-primary mb-3">الوصول إلينا</h5>
        <ul class="list-unstyled small lh-lg">
          <li><i class="fa fa-map-marker-alt text-primary ms-2"></i> امتداد شارع جيهان بعد دار الضيافة</li>
          <li><i class="fa fa-envelope text-primary ms-2"></i> info@tester.com</li>
          <li><i class="fa fa-phone text-primary ms-2"></i> <a href="https://wa.me/01554866941" class="text-decoration-none text-dark">01554866941</a></li>
        </ul>
      </div>

      <!-- الفئات -->
      <div class="col-lg-3 col-md-6">
        <h5 class="fw-bold text-primary mb-3">التسوق والفئات</h5>
        <ul class="list-unstyled small lh-lg">
          <li><a href="{{ route('products') }}" class="text-dark text-decoration-none">أجهزة اللاب توب</a></li>
          <li><a href="{{ route('home') }}#women" class="text-dark text-decoration-none">صيانة جميع المنتجات</a></li>
          <li><a href="{{ route('home') }}#kids" class="text-dark text-decoration-none">جميع الأقسام</a></li>
        </ul>
      </div>

      <!-- روابط مهمة -->
      <div class="col-lg-3 col-md-6">
        <h5 class="fw-bold text-primary mb-3">روابط مهمة</h5>
        <ul class="list-unstyled small lh-lg">
          <li><a href="{{ route('home') }}" class="text-dark text-decoration-none">الصفحة الرئيسية</a></li>
          <li><a href="{{ route('about') }}" class="text-dark text-decoration-none">من نحن</a></li>
          <li><a href="{{ route('home') }}#contact" class="text-dark text-decoration-none">اتصل بنا</a></li>
        </ul>
      </div>
    </div>

    <!-- تحت الفوتر -->
    <div class="under-footer text-center mt-4 border-top pt-3">
      <ul class="list-inline mb-3">
        <li class="list-inline-item mx-2">
          <a href="https://www.facebook.com/share/15LXLfbLJc/" target="_blank" class="text-primary fs-5">
            <i class="fab fa-facebook-f"></i>
          </a>
        </li>
        <li class="list-inline-item mx-2">
          <a href="https://wa.me/01554866941" target="_blank" class="text-success fs-5">
            <i class="fab fa-whatsapp"></i>
          </a>
        </li>
        <li class="list-inline-item mx-2">
          <a href="https://www.tiktok.com/@tester9471?_t=ZS-8zmaHzQWN62&_r=1" target="_blank" class="text-dark fs-5">
            <i class="fab fa-tiktok"></i>
          </a>
        </li>
        <li class="list-inline-item mx-2">
          <a href="https://www.instagram.com/ahmed.r2fat.1192?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="text-danger fs-5">
            <i class="fab fa-instagram"></i>
          </a>
        </li>
      </ul>

      <p class="text-muted small mb-0">
        حقوق النشر © 2025 شركة <span class="text-primary fw-bold">Tester</span> لصيانة وبيع كل ما يخص اللاب توب والأجهزة المستوردة. جميع الحقوق محفوظة. <br>
        تصميم: 
        <a href="https://wa.me/201004976135" target="_blank" class="fw-bold text-primary text-decoration-none" title="Backend Developer">
          Mahmoud Ebrahim
        </a>
      </p>
    </div>
  </div>
</footer>

<!-- Footer Style -->
<style>
footer ul li a:hover {
  color: #0d6efd !important;
}
footer .fa {
  transition: transform 0.3s ease, color 0.3s ease;
}
footer .fa:hover {
  transform: translateY(-3px);
}
</style>




    <!-- jQuery -->
    <script src="{{ asset('front/assets/js/jquery-2.1.0.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

    <!-- Plugins -->
    <script src="{{ asset('front/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('front/assets/js/accordions.js') }}"></script>
    <script src="{{ asset('front/assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('front/assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/slick.js') }}"></script>
    <script src="{{ asset('front/assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('front/assets/js/isotope.js') }}"></script>
    <!-- Global Init -->
    <script src="{{ asset('front/assets/js/custom.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->

    <script src="{{ asset('front/assets/js/popper.js') }}"></script>
    <script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>

    <!-- Owl Carousel JS -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    {{-- cart   --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cartMenu = document.querySelector(".cart-menu");
            const cartToggle = cartMenu.querySelector(".cart-toggle");
            cartToggle.addEventListener("click", function(e) {
                e.preventDefault();
                cartMenu.classList.toggle("open");
            });
            document.addEventListener("click", function(e) {
                if (!cartMenu.contains(e.target)) {
                    cartMenu.classList.remove("open");
                }
            });
        });
    </script>

    {{-- search  --}}
    <script>
        document.getElementById('searchToggle').addEventListener('click', function(e) {
            e.preventDefault();
            let form = document.getElementById('searchForm');
            form.classList.toggle('d-none');
        });
    </script>
</body>
