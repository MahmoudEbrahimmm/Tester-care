<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title-page', 'Dashboard -لوحة التحكم')</title>
    <link rel="icon" href="{{ asset('front/assets/images/Test_IT_logo.png') }}">

    {{-- fontawssone --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dashboard/css/styles.css') }}" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    @stack('styles')
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        @if (Auth::user() && Auth::user()->role == 'admin')
            <a class="navbar-brand ps-3" href="{{ route('home') }}">{{ config('app.name') }}</a>
        @endif
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Nav-bar left -->

        
        <!-- Navbar-->

<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <!-- الإشعارات -->
    <x-notification />

    <!-- الحساب -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
           role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user fa-fw me-1"></i> الحساب
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow rounded-3" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href=""><i class="fas fa-cog me-2"></i>الإعدادات</a></li>
            <li><a class="dropdown-item" href=""><i class="fas fa-list me-2"></i>سجل النشاط</a></li>
            <li><hr class="dropdown-divider" /></li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item btn bg-white">
                    <i class="fas fa-sign-out-alt me-2"></i> تسجيل الخروج
                </button>
            </form>
        </ul>
    </li>
</ul>



        </ul>

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <h5 class="sb-sidenav-menu-heading">{{ Auth::user()->name ?? 'Admin Name' }}</h5>
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            لوحة التحكم
                        </a>
                        <a href="{{ route('dashboard.users.index') }}" class="nav-link">المستخدمين</a>

                        <a href="{{ route('dashboard.categories.index') }}" class="nav-link">الاقسام</a>

                        <a href="{{ route('dashboard.products.index') }}" class="nav-link">المنتجات</a>
                        <a href="{{ route('dashboard.orders.index') }}" class="nav-link">طلبات الزبائن</a>
                        <a href="{{ route('dash.contact') }}" class="nav-link">رسائل العملاء</a>


                    </div>
                </div>

                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: {{ Auth::user()->name ?? 'Admin Name' }}</div>
                    {{ config('app.name') }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">

            <div class="container-fluid px-4">
                @yield('content')
            </div>




            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">
                            2025 &copy; Mahmoud Ebrahim - All Rights Reserved
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('dashboard/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('dashboard/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard/js/datatables-simple-demo.js') }}"></script>
    @stack('scripts')
</body>

</html>
