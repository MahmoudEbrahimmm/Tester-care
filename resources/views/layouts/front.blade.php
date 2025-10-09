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



    <!-- ***** Preloader Start ***** -->
    {{-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> --}}
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area bg-white shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('front/assets/images/Test_IT_logo.png') }}" alt="Logo" style="width:120px;">
            </a>

            <!-- زرار الموبايل -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-end" dir="rtl">
    @if (Auth::user() && Auth::user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">لوحة التحكم</a>
        </li>
    @endif
    <li class="nav-item"><a class="nav-link active" href="#top">الرئيسية</a></li>
    <li class="nav-item"><a class="nav-link" href="#men">المنتجات</a></li>
    <li class="nav-item"><a class="nav-link" href="#women">قطع الغيار</a></li>
    <li class="nav-item"><a class="nav-link" href="#kids">الاقسام</a></li>
    <li class="nav-item"><a class="nav-link" href="#contact">تواصل معنا</a></li>

    <!-- صفحات -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button"
            data-bs-toggle="dropdown">
            الصفحات
        </a>
        <ul class="dropdown-menu text-end" aria-labelledby="pagesDropdown" dir="rtl">
            <li><a class="dropdown-item" href="{{ route('products') }}">كل المنتجات</a></li>
            <li><a class="dropdown-item" href="{{ route('about') }}">من نحن</a></li>
        </ul>
    </li>
</ul>


                {{-- rtl --}}
                <ul class="navbar-nav ms-auto align-items-center">
                    {{-- cart --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link position-relative" href="#" id="cartDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
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
                                <li><a href="{{ route('cart') }}" class="btn btn-sm btn-primary w-100">عرض الكل</a>
                                </li>
                            @else
                                <li class="text-center">السلة فارغة</li>
                            @endif
                        </ul>
                    </li>

                    <!-- search -->
                    <li class="nav-item mx-3">
                        <a href="#" class="nav-link" id="searchToggle"><i class="fa fa-search"></i></a>
                        <form action="{{ route('products.search') }}" method="GET"
                            class="d-none position-absolute bg-white p-2 shadow rounded" id="searchForm"
                            style="top:60px; right:10px; z-index:1000; width: 250px;">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control"
                                    placeholder="ابحث عن منتج..." required>
                                <button type="submit" class="btn btn-primary"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </li>

                    <!-- account -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-user"></i> {{ Auth::user()->name ?? '' }}
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

    <div class="mt-5">
        @yield('content')
    </div>



    <!-- ***** Footer Start ***** -->
<footer dir="rtl">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3">
                <div class="first-item">
                    <div class="logo">
                        <img src="{{ asset('front/assets/images/Test_IT_logo.png') }}" style="width:120px;" alt="Logo">
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <h4>الوصول الينا</h4>
                <ul>
                    <li><a href="#"> امتداد شارع جيهان بعد دار الضيافه شارع زهور هولندا</a></li>
                    <li><a href="#">info@tester.com</a></li>
                    <li><a href="https://wa.me/01554866941">015-548-66941</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>التسوق والفئات</h4>
                <ul>
                    <li><a href="{{ route('products') }}">أجهزة اللاب توب </a></li>
                    <li><a href="{{ route('home') }}#women">صيانة جميع المنتجات</a></li>
                    <li><a href="{{ route('home') }}#kids">جميع الاقسام</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>روابط مهمة</h4>
                <ul>
                    <li><a href="{{ route('home') }}">الصفحة الرئيسية</a></li>
                    <li><a href="{{ route('about') }}">من نحن</a></li>
                    <li><a href="{{ route('home') }}#contact">اتصل بنا</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="under-footer">
                    <ul class="mb-3">
                        <li><a href="https://www.facebook.com/share/15LXLfbLJc/" target="_blank" class="text-primary"><i class="fab fa-facebook-f"></i></a></li>
                        <li>
                            <a href="https://wa.me/01554866941" target="_blank" class="text-success">
                                <i class="fab fa-whatsapp fa-lg"></i>
                            </a>
                        </li>
                        <li><a href="https://www.tiktok.com/@tester9471?_t=ZS-8zmaHzQWN62&_r=1"><i class="fab fa-tiktok"></i></a></li>
                        <li>
                            <a href="https://www.instagram.com/ahmed.r2fat.1192?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="text-danger">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                    <p class="text-center">
                        حقوق النشر © 2025 شركة  لصيانة وبيع كل ما يخص اللاب توب والأجهزة المستوردة. جميع الحقوق محفوظة. <br>
                        تصميم: <a href="https://wa.me/201004976135" target="_blank" title="Backend devolper">Mahmoud Ebrahim</a>
                        <span class="fa-stack"> </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>



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
