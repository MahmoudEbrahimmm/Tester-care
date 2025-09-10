@extends('layouts.front')
@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            @if (session()->has('success'))
                                <div class="alert bg-success text-white mb-3 mt-3">{{ session('success') }}</div>
                            @endif
                            <div class="inner-content mt-4">
                                <h4><img src="{{ asset('front/assets/images/Test_IT_logo.png') }}" style="width: 300px;"
                                        alt=""></h4>
                                <span> &amp;نقدم أفضل خدمات صيانة أجهزة اللاب توب بجودة عالية، ونوفر تشكيلة متنوعة من
                                    الأجهزة والإكسسوارات الأصلية لتلبية كل احتياجاتك.</span>
                                <div class="main-border-button">
                                    <a href="#">Purchase Now!</a>
                                </div>
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
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>المنتجات</h2>
                        <div
                            style="direction: ltr; text-align: left; line-height: 1.6; font-size: 16px; font-family: Arial, sans-serif;">
                            تقدم شركتنا مجموعة واسعة من المنتجات الإلكترونية عالية الجودة لتلبية كافة احتياجات عملائنا. تشمل
                            منتجاتنا <strong>أجهزة اللابتوب والشاشات الحديثة</strong> بمواصفات متنوعة وأسعار تنافسية،
                            بالإضافة إلى <strong>الإكسسوارات الأصلية والمميزة</strong> مثل الكابلات، الحقائب، والفأرات
                            ولوحات المفاتيح. كما نوفر منتجات مستوردة بعناية لضمان أعلى معايير الجودة والأداء. هدفنا هو توفير
                            كل ما يحتاجه العملاء لتجربة استخدام مثالية تجمع بين الكفاءة، المتانة، والتصميم العصري.
                        </div>

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
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>قطع الغيار</h2>
                        <div
                            style="direction: ltr; text-align: left; line-height: 1.6; font-size: 16px; font-family: Arial, sans-serif;">
                            تقدم شركتنا تشكيلة واسعة من <strong>قطع الغيار الأصلية للأجهزة الإلكترونية</strong> لضمان أفضل
                            أداء وطول عمر للأجهزة. تشمل قطع الغيار الخاصة باللابتوب والشاشات، بالإضافة إلى
                            <strong>الإكسسوارات الأساسية والمهمة</strong> التي تدعم عمل الأجهزة بشكل سلس وفعال. نحن نحرص على
                            توفير منتجات ذات جودة عالية وموثوقة لتلبية احتياجات العملاء وصيانة أجهزتهم بأعلى معايير
                            الاحترافية.
                        </div>

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
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>الاقسام</h2>
                        <div
                            style="direction: ltr; text-align: left; line-height: 1.6; font-size: 16px; font-family: Arial, sans-serif;">
                            تتمثل أنشطة شركتنا في مجموعة متكاملة من الخدمات المتعلقة بالأجهزة الإلكترونية. نحن متخصصون في
                            <strong>صيانة وبيع أجهزة اللابتوب والشاشات</strong> بجودة عالية وبأفضل الأسعار. كما نقوم بعمليات
                            <strong>الاستيراد للأجهزة والإكسسوارات الإلكترونية</strong> لتلبية احتياجات عملائنا بشكل كامل.
                            إضافة إلى ذلك، نقدم مجموعة واسعة من <strong>الإكسسوارات الأصلية والمميزة</strong> لدعم تجربة
                            الاستخدام اليومية للأجهزة. هدفنا هو تقديم خدمات متكاملة تجمع بين البيع، الصيانة، والتجهيز بأعلى
                            معايير الاحترافية والجودة.
                        </div>

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
@endsection
