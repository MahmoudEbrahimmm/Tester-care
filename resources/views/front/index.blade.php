@extends('layouts.front')
@section('content')
    <!-- ================= Hero Section ================= -->
    <section class="hero-section w-100 py-3" dir="rtl">
        <div class="container">
            <div class="row align-items-center gy-4 p-4">
                <!-- النص -->
                <div class="col-lg-6 text-end">
                    <h1 class="fw-bold mb-3 text-dark">
                        مرحبًا بك في <span class="text-warning">Tester</span>
                    </h1>
                    <p class="text-muted mb-4 lh-lg">
                        نحن شركة متخصصة في <strong>صيانة وبيع الأجهزة الإلكترونية</strong>،
                        نقدم منتجات عالية الجودة تشمل <strong>اللابتوبات، الشاشات، والإكسسوارات الأصلية</strong>
                        بأسعار منافسة وخدمة عملاء متميزة. هدفنا هو توفير تجربة تسوق ذكية وآمنة تجمع بين
                        الكفاءة والاحترافية.
                    </p>

                    <div class="d-flex justify-content-end align-items-center gap-3 flex-wrap flex-md-nowrap">

                        <form action="{{ route('products.search') }}" method="GET"
                            class="d-flex hero-search me-5 p-1 mx-3">
                            <input type="text" name="query" class="form-control rounded-pill px-3"
                                placeholder="ابحث عن المنتج أو رقم التتبع..." required>
                            <button type="submit"
                                class="btn btn-warning ms-2 px-4 py-2 fw-bold rounded-pill shadow-sm text-dark">
                                <i class="fa fa-search ms-1"></i>
                            </button>
                        </form>

                        <!-- زر تصفح المنتجات -->
                        <a href="{{ route('products') }}"
                            class="btn btn-warning px-4 py-2 fw-bold rounded-pill shadow-sm text-dark d-flex align-items-center me-5 m-2">
                            <i class="fa fa-shopping-bag ms-2"></i> تصفح المنتجات
                        </a>

                        <!-- زر سلة المشتريات -->
                        <a href="{{ route('cart') }}"
                            class="btn btn-outline-dark px-4 py-2 fw-bold rounded-pill shadow-sm d-flex align-items-center position-relative">
                            <i class="fa fa-shopping-cart ms-2"></i> سلة المشتريات
                            @if (session('cart') && count(session('cart')) > 0)
                                <span
                                    class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-warning text-dark">
                                    {{ count(session('cart')) }}
                                </span>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- الصورة -->
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('front/assets/images/Test_IT_logo.png') }}" alt="Electronics"
                        class="img-fluid rounded-4 shadow-sm hero-img">
                </div>
            </div>
        </div>
    </section>
    <!-- ================= End Hero Section ================= -->
    <!-- ====== CSS Styling ====== -->
    <style>
        .hero-section {
            background: linear-gradient(90deg, #fff 55%, #fdf4ec 100%);
            border-radius: 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .hero-img {
            max-height: 420px;
            object-fit: contain;
            transition: transform 0.4s ease;
        }

        .hero-img:hover {
            transform: scale(1.05);
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-warning {
            background-color: #f68b1e !important;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e47912 !important;
            color: #fff !important;
        }

        .btn-outline-dark:hover {
            background-color: #000 !important;
            color: #fff !important;
        }

        .badge {
            font-size: 0.7rem;
            padding: 0.35em 0.5em;
            border: 1px solid #fff;
        }

        .hero-search input {
            height: 45px;
            border: 2px solid #f68b1e;
            width: 230px;
        }

        .hero-search button {
            height: 45px;
        }

        @media (max-width: 576px) {

            .d-flex.gap-3 a,
            .hero-search {
                flex: 1 1 auto;
                text-align: center;
            }

            .hero-search input {
                width: 100%;
            }
        }
    </style>



    <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
        <div class="container" dir="rtl">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading lh-lg fs-6" style="text-align: right;">
                        <h2 class="mb-3" style="text-align: right;">المنتجات</h2>
                        <p style="text-align: right;"> تقدم شركتنا مجموعة واسعة من المنتجات الإلكترونية عالية
                            الجودة لتلبية كافة احتياجات عملائنا. تشمل منتجاتنا <strong>أجهزة اللابتوب والشاشات
                                الحديثة</strong> بمواصفات متنوعة وأسعار تنافسية، بالإضافة إلى
                            <strong>الإكسسوارات الأصلية والمميزة</strong> مثل الكابلات، الحقائب، والفأرات ولوحات
                            المفاتيح. كما نوفر منتجات مستوردة بعناية لضمان أعلى معايير الجودة والأداء. هدفنا هو
                            توفير كل ما يحتاجه العملاء لتجربة استخدام مثالية تجمع بين الكفاءة، المتانة، والتصميم
                            العصري.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            @foreach ($products as $product)
                                <div class="item bg-white rounded-4 shadow-sm overflow-hidden border-0 text-center p-3 position-relative"
                                    style="transition: all 0.4s ease; cursor: pointer; min-height: 380px;">

                                    <div class="thumb overflow-hidden rounded-4 position-relative"
                                        style="background: #f8f9fa;">
                                        <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="w-100 d-block mx-auto" loading="lazy"
                                            style="height: 250px; object-fit: cover; transition: transform 0.5s ease;">

                                        <div class="hover-content position-absolute top-50 start-50 translate-middle d-flex gap-3 opacity-0"
                                            style="transition: all 0.4s ease;"> <a
                                                href="{{ route('show.product', $product->slug) }}"
                                                class="btn btn-light rounded-circle shadow-sm"
                                                style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fa fa-eye text-primary"></i> </a> <a
                                                href="{{ route('add.to.cart', $product->id) }}"
                                                class="btn btn-light rounded-circle shadow-sm"
                                                style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fa fa-shopping-cart text-success"></i> </a> </div>
                                    </div>
                                    <div class="down-content mt-3">
                                        <h4 class="fw-bold text-dark mb-2">{{ $product->name }}</h4> <span
                                            class="fw-semibold text-success fs-5">{{ $product->price }}
                                            ج.م</span>
                                        <div class="mt-3 d-flex justify-content-center gap-3 d-md-none"> <a
                                                href="{{ route('show.product', $product->slug) }}"
                                                class="btn btn-outline-primary btn-sm"> <i class="fa fa-eye"></i> </a> <a
                                                href="{{ route('add.to.cart', $product->id) }}"
                                                class="btn btn-outline-warning btn-sm"> <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CSS -->
        <style>
            .item:hover {
                transform: translateY(-6px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            }

            .item .thumb:hover img {
                transform: scale(1.08);
                filter: brightness(0.9);
            }

            .item .thumb:hover .hover-content {
                opacity: 1;
            }

            .item a:hover {
                background: linear-gradient(90deg, #00b09b, #96c93d);
                color: #fff !important;
                transform: scale(1.1);
            }

            .owl-carousel .item {
                margin: 10px;
            }

            .owl-carousel {
                display: flex !important;
                align-items: stretch !important;
            }

            .owl-stage {
                display: flex !important;
            }

            @media (max-width: 768px) {
                .item img {
                    height: 180px;
                }

                .item {
                    padding: 1rem;
                }
            }
        </style>
        <!-- JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('.owl-men-item').owlCarousel({
                    items: 4,
                    loop: true,
                    margin: 15,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    smartSpeed: 700,
                    dots: false,
                    nav: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: 2
                        },
                        992: {
                            items: 3
                        },
                        1200: {
                            items: 4
                        }
                    }
                });
            });
        </script>
    </section>
    <!-- ***** Men Area Ends ***** -->

    <!-- ***** Women Area Starts ***** -->
    <section class="section" id="women">
        <div class="container" dir="rtl">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading lh-lg fs-6" style="text-align: right;">
                        <h2 class="mb-3" style="text-align: right;">قطع الغيار</h2>
                        <p style="text-align: right;"> تقدم شركتنا تشكيلة واسعة من <strong>قطع الغيار الأصلية
                                للأجهزة الإلكترونية</strong> لضمان أفضل أداء وطول عمر للأجهزة. تشمل قطع الغيار
                            الخاصة باللابتوب والشاشات، بالإضافة إلى <strong>الإكسسوارات الأساسية
                                والمهمة</strong> التي تدعم عمل الأجهزة بشكل سلس وفعال. نحن نحرص على توفير منتجات
                            ذات جودة عالية وموثوقة لتلبية احتياجات العملاء وصيانة أجهزتهم بأعلى معايير
                            الاحترافية. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                            @foreach ($productsOfCateory as $product)
                                <div class="item bg-white rounded-4 shadow-sm overflow-hidden border-0 text-center p-3 position-relative"
                                    style="transition: all 0.4s ease; cursor: pointer; min-height: 380px;">

                                    <div class="thumb overflow-hidden rounded-4 position-relative"
                                        style="background: #f8f9fa;">
                                        <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="w-100 d-block mx-auto" loading="lazy"
                                            style="height: 250px; object-fit: cover; transition: transform 0.5s ease;">

                                        <div class="hover-content position-absolute top-50 start-50 translate-middle d-flex gap-3 opacity-0"
                                            style="transition: all 0.4s ease;"> <a
                                                href="{{ route('show.product', $product->slug) }}"
                                                class="btn btn-light rounded-circle shadow-sm"
                                                style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fa fa-eye text-primary"></i> </a> <a
                                                href="{{ route('add.to.cart', $product->id) }}"
                                                class="btn btn-light rounded-circle shadow-sm"
                                                style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fa fa-shopping-cart text-success"></i> </a> </div>
                                    </div>
                                    <div class="down-content mt-3">
                                        <h4 class="fw-bold text-dark mb-2">{{ $product->name }}</h4> <span
                                            class="fw-semibold text-success fs-5">{{ $product->price }}
                                            ج.م</span>
                                        <div class="mt-3 d-flex justify-content-center gap-3 d-md-none"> <a
                                                href="{{ route('show.product', $product->slug) }}"
                                                class="btn btn-outline-primary btn-sm"> <i class="fa fa-eye"></i> </a> <a
                                                href="{{ route('add.to.cart', $product->id) }}"
                                                class="btn btn-outline-warning btn-sm"> <i
                                                    class="fa fa-shopping-cart"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CSS -->
        <style>
            .item:hover {
                transform: translateY(-6px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            }

            .item .thumb:hover img {
                transform: scale(1.08);
                filter: brightness(0.9);
            }

            .item .thumb:hover .hover-content {
                opacity: 1;
            }

            .item a:hover {
                background: linear-gradient(90deg, #00b09b, #96c93d);
                color: #fff !important;
                transform: scale(1.1);
            }

            .owl-carousel .item {
                margin: 10px;
            }

            .owl-carousel {
                display: flex !important;
                align-items: stretch !important;
            }

            .owl-stage {
                display: flex !important;
            }

            @media (max-width: 768px) {
                .item img {
                    height: 180px;
                }

                .item {
                    padding: 1rem;
                }
            }
        </style>
        <!-- JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('.owl-women-item').owlCarousel({
                    items: 4,
                    loop: true,
                    margin: 15,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    smartSpeed: 700,
                    dots: false,
                    nav: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: 2
                        },
                        992: {
                            items: 3
                        },
                        1200: {
                            items: 4
                        }
                    }
                });
            });
        </script>
    </section>
    <!-- ***** Women Area Ends ***** -->

    <!-- ***** Kids Area Starts ***** -->
    <section class="section" id="kids">
        <div class="container" dir="rtl">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading lh-lg fs-6" style="text-align: right;">
                        <h2 class="mb-3" style="text-align: right;">الاقسام</h2>
                        <p style="text-align: right;"> تتمثل أنشطة شركتنا في مجموعة متكاملة من الخدمات المتعلقة
                            بالأجهزة الإلكترونية. نحن متخصصون في <strong>صيانة وبيع أجهزة اللابتوب
                                والشاشات</strong> بجودة عالية وبأفضل الأسعار. كما نقوم بعمليات <strong>الاستيراد
                                للأجهزة والإكسسوارات الإلكترونية</strong> لتلبية احتياجات عملائنا بشكل كامل.
                            إضافة إلى ذلك، نقدم مجموعة واسعة من <strong>الإكسسوارات الأصلية والمميزة</strong>
                            لدعم تجربة الاستخدام اليومية للأجهزة. هدفنا هو تقديم خدمات متكاملة تجمع بين البيع،
                            الصيانة، والتجهيز بأعلى معايير الاحترافية والجودة. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kid-item-carousel">
                        <div class="owl-kid-item owl-carousel">
                            @foreach ($categories as $category)
                                <div class="item bg-white rounded-4 shadow-sm overflow-hidden border-0 text-center p-3 position-relative"
                                    style="transition: all 0.4s ease; cursor: pointer; min-height: 360px;">
                                    <div class="thumb overflow-hidden rounded-4 position-relative"
                                        style="background: #f8f9fa;">
                                        <img src="{{ asset('uploads/' . $category->image) }}"
                                            alt="{{ $category->name }}" class="w-100 d-block mx-auto" loading="lazy"
                                            style="height: 220px; object-fit: cover; transition: transform 0.5s ease;">
                                    </div>
                                    <div class="down-content mt-3">
                                        <h4 class="fw-bold text-dark mb-2">{{ $category->name }}</h4>
                                        <p class="text-muted small mb-3">{{ $category->description }}</p>

                                        <ul class="list-unstyled d-flex justify-content-center gap-3 mb-0">
                                            <li> <a href="https://www.facebook.com/share/15LXLfbLJc/" target="_blank"
                                                    class="text-primary d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                                                    style="width: 40px; height: 40px; transition: all 0.3s ease;">
                                                    <i class="fab fa-facebook-f"></i> </a> </li>
                                            <li> <a href="https://wa.me/01554866941" target="_blank"
                                                    class="text-success d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                                                    style="width: 40px; height: 40px; transition: all 0.3s ease;">
                                                    <i class="fab fa-whatsapp"></i> </a> </li>
                                            <li> <a href="https://www.tiktok.com/@tester9471?_t=ZS-8zmaHzQWN62&_r=1"
                                                    target="_blank"
                                                    class="text-dark d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                                                    style="width: 40px; height: 40px; transition: all 0.3s ease;">
                                                    <i class="fab fa-tiktok"></i> </a> </li>
                                            <li> <a href="https://www.instagram.com/ahmed.r2fat.1192" target="_blank"
                                                    class="text-danger d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                                                    style="width: 40px; height: 40px; transition: all 0.3s ease;">
                                                    <i class="fab fa-instagram"></i> </a> </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- CSS -->
        <style>
            .item:hover {
                transform: translateY(-6px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            }

            .item:hover img {
                transform: scale(1.08);
                filter: brightness(0.9);
            }

            .item a:hover {
                background: linear-gradient(90deg, #00b09b, #96c93d);
                color: #fff !important;
                transform: scale(1.1);
            }

            .owl-carousel .item {
                margin: 10px;
            }

            .owl-carousel {
                display: flex !important;
                align-items: stretch !important;
            }

            .owl-stage {
                display: flex !important;
            }

            @media (max-width: 768px) {
                .item img {
                    height: 160px;
                }
            }
        </style> <!-- JS (إصلاح السلايدر) -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                $(".owl-kid-item").owlCarousel({
                    loop: true,
                    margin: 20,
                    nav: true,
                    dots: false,
                    autoplay: true,
                    autoplayTimeout: 3500,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: 2
                        },
                        992: {
                            items: 3
                        },
                        1200: {
                            items: 4
                        }
                    },
                    onInitialized: function() {
                        $(".owl-item").css("visibility", "visible");
                    }
                });
            });
        </script>



    </section>
    <!-- ***** Kids Area Ends ***** -->
    <!-- ***** Contact Area Starts ***** -->
    <x-contact-home />
    <!-- ***** Contact Area Ends ***** -->

    <!-- ***** Social Area Starts ***** -->
    
    <!-- ***** Social Area Ends ***** -->
    </div>
    </div>
    </div>
@endsection
