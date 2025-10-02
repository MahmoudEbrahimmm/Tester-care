@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11 m-auto">

                <!-- ***** Main Banner Area Start ***** -->
                <div class="main-banner" id="top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="left-content">
                                    <div class="thumb">
                                        @if (session()->has('success'))
                                            <div class="alert bg-success text-white mb-5">{{ session('success') }}</div>
                                        @endif
                                        <div class="inner-content">
                                            <h4><img src="{{ asset('front/assets/images/Test_IT_logo.png') }}"
                                                    style="width: 300px;" alt=""></h4>
                                            <span> &amp;نقدم أفضل خدمات صيانة أجهزة اللاب توب بجودة عالية، ونوفر تشكيلة
                                                متنوعة من
                                                الأجهزة والإكسسوارات الأصلية لتلبية كل احتياجاتك.</span>

                                        </div>
                                        <img src="{{ asset('front/assets/images/خلفيه 1.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-content">
                                    <div class="row p-3 rounded">

                                        @foreach ($category_home as $category)
                                            <x-card-category :category="$category" />
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Main Banner Area End ***** -->

                <!-- ***** Men Area Starts ***** -->
                <section class="section" id="men">
                    <div class="container" dir="rtl">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-heading lh-lg fs-6" style="text-align: right;">
                                    <h2 class="mb-3" style="text-align: right;">المنتجات</h2>
                                    <p style="text-align: right;">
                                        تقدم شركتنا مجموعة واسعة من المنتجات الإلكترونية عالية الجودة لتلبية كافة احتياجات
                                        عملائنا. تشمل منتجاتنا
                                        <strong>أجهزة اللابتوب والشاشات الحديثة</strong> بمواصفات متنوعة وأسعار تنافسية،
                                        بالإضافة إلى <strong>الإكسسوارات الأصلية والمميزة</strong> مثل الكابلات، الحقائب،
                                        والفأرات ولوحات المفاتيح. كما نوفر منتجات مستوردة بعناية لضمان أعلى معايير الجودة
                                        والأداء. هدفنا هو توفير كل ما يحتاجه العملاء لتجربة استخدام مثالية تجمع بين الكفاءة،
                                        المتانة، والتصميم العصري.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="men-item-carousel">
                                    <div class="owl-men-item owl-carousel">

                                        @foreach ($products as $product)
                                            <x-all-products :product="$product" />
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ***** Men Area Ends ***** -->

                <!-- ***** Women Area Starts ***** -->
                <section class="section" id="women">
                    <div class="container" dir="rtl">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-heading lh-lg fs-6" style="text-align: right;">
                                    <h2 class="mb-3" style="text-align: right;">قطع الغيار</h2>
                                    <p style="text-align: right;">
                                        تقدم شركتنا تشكيلة واسعة من <strong>قطع الغيار الأصلية للأجهزة الإلكترونية</strong>
                                        لضمان أفضل
                                        أداء وطول عمر للأجهزة. تشمل قطع الغيار الخاصة باللابتوب والشاشات، بالإضافة إلى
                                        <strong>الإكسسوارات الأساسية والمهمة</strong> التي تدعم عمل الأجهزة بشكل سلس وفعال.
                                        نحن نحرص على
                                        توفير منتجات ذات جودة عالية وموثوقة لتلبية احتياجات العملاء وصيانة أجهزتهم بأعلى
                                        معايير
                                        الاحترافية.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="women-item-carousel">
                                    <div class="owl-women-item owl-carousel">
                                        @foreach ($productsOfCateory as $product)
                                            <x-spare-products :product="$product" />
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ***** Women Area Ends ***** -->

                <!-- ***** Kids Area Starts ***** -->
                <section class="section" id="kids">
                    <div class="container" dir="rtl">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-heading lh-lg fs-6" style="text-align: right;">
                                    <h2 class="mb-3" style="text-align: right;">الاقسام</h2>
                                    <p style="text-align: right;">
                                        تتمثل أنشطة شركتنا في مجموعة متكاملة من الخدمات المتعلقة بالأجهزة الإلكترونية. نحن
                                        متخصصون في
                                        <strong>صيانة وبيع أجهزة اللابتوب والشاشات</strong> بجودة عالية وبأفضل الأسعار. كما
                                        نقوم بعمليات
                                        <strong>الاستيراد للأجهزة والإكسسوارات الإلكترونية</strong> لتلبية احتياجات عملائنا
                                        بشكل كامل.
                                        إضافة إلى ذلك، نقدم مجموعة واسعة من <strong>الإكسسوارات الأصلية والمميزة</strong>
                                        لدعم تجربة
                                        الاستخدام اليومية للأجهزة. هدفنا هو تقديم خدمات متكاملة تجمع بين البيع، الصيانة،
                                        والتجهيز بأعلى
                                        معايير الاحترافية والجودة.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="kid-item-carousel">
                                    <div class="owl-kid-item owl-carousel">
                                        @foreach ($categories as $category)
                                            <x-all-categories :category="$category" />
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ***** Kids Area Ends ***** -->

                <!-- ***** Contact Area Starts ***** -->
                <x-contact-home />
                <!-- ***** Contact Area Ends ***** -->
                <!-- ***** Social Area Starts ***** -->
                <section class="section" id="social">
                    <div class="container">
                        <div class="row images">
                            @foreach ($products_media as $product)
                                <x-media-product :product="$product" />
                            @endforeach
                        </div>
                    </div>
                </section>
                <!-- ***** Social Area Ends ***** -->
            </div>
        </div>
    </div>
@endsection
