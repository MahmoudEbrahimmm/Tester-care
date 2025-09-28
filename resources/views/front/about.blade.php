@extends('layouts.front')
@section('page-url', 'عن الشركة')
@section('content')



    <!-- ***** About Area Starts ***** -->
    <div class="about-us py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10 m-auto text-center mt-5 mb-5">
                    <h2>عن شركة Tester</h2>
                    <h5 class="mt-3">خبرة واحترافية في صيانة وبيع اللابتوبات الاستيراد والإكسسوارات</h5>
                </div>
                <div class="col-lg-6 mb-4 mt-5">
                    <div class="col-lg-6">
                        <div id="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6837.345080912523!2d31.359388868119733!3d31.03537183333662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1757598110043!5m2!1sen!2seg"
                                width="500px" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
                            <!-- You can simply copy and paste "Embed a map" code from Google Maps for any location. -->

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <h4>من نحن</h4>
                        <span>
                            شركة <strong>Tester</strong> متخصصة في تقديم خدمات صيانة اللابتوبات الاستيراد بأعلى جودة
                            بالإضافة إلى بيع أجهزة لابتوب استيراد مضمونة وإكسسوارات أصلية.
                        </span>
                        <div class="quote mt-3">
                            <i class="fa fa-quote-left"></i>
                            <p>
                                "هدفنا تقديم منتجات وخدمات موثوقة تلبي احتياجات عملائنا وتساعدهم على إنجاز أعمالهم بكفاءة."
                            </p>
                        </div>
                        <p>
                            نتميز بتوفير أفضل أجهزة <strong>اللابتوبات الاستيراد</strong> بأسعار مناسبة وبضمان حقيقي،
                            إلى جانب فريق متخصص في <strong>صيانة الأجهزة</strong> واكتشاف الأعطال وحلها بسرعة وكفاءة.
                            كما نوفر مجموعة متنوعة من <strong>الإكسسوارات الأصلية</strong> مثل الشواحن، الحقائب، والماوس.
                        </p>
                        <ul class="social-icons">
                            <li><a href="#" target="_blank" class="text-primary"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="https://wa.me/2010020258177" target="_blank" class="text-success">
                                    <i class="fab fa-whatsapp fa-lg"></i>
                                </a>

                            </li>
                            <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
                            <li>
                                <a href="https://www.instagram.com/ahmed.r2fat.1192?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                                    target="_blank" class="text-danger">
                                    <i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Our Team Area Starts ***** -->
    <section class="our-team py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="section-heading text-center">
                        <h2>فريقنا</h2>
                        <h5>فنيون محترفون بخبرة طويلة في صيانة وبيع اللابتوبات</h5>
                    </div>
                </div>
                @foreach ($category_about as $category)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="team-item shadow-sm rounded h-100">
                            <div class="thumb position-relative">
                                <div class="hover-effect">
                                    <div class="inner-content">
                                        <ul>
                                            <li><a href="https://www.facebook.com/share/15LXLfbLJc/" target="_blank" class="text-primary"><i
                                                        class="fab fa-facebook-f"></i></a></li>
                                            <li>
                                                <a href="https://wa.me/01554866941" target="_blank" class="text-success">
                                                    <i class="fab fa-whatsapp fa-lg"></i>
                                                </a>

                                            </li>
                                            <li><a href="https://www.tiktok.com/@tester9471?_t=ZS-8zmaHzQWN62&_r=1"><i class="fab fa-tiktok"></i></a></li>
                                            <li>
                                                <a href="https://www.instagram.com/ahmed.r2fat.1192?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                                                    target="_blank" class="text-danger">
                                                    <i class="fab fa-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <img src="{{ asset('uploads/' . $category->image) }}" alt="{{ $category->name }}"
                                    class="img-fluid rounded-top">
                            </div>
                            <div class="down-content p-3">
                                <h4>{{ $category->name }}</h4>
                                <span>{{ $category->description }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Our Team Area Ends ***** -->

    <!-- ***** Services Area Starts ***** -->
    <section class="our-services py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="section-heading text-center">
                        <h2>خدماتنا</h2>
                        <h5>كل ما تحتاجه في مكان واحد</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item text-center p-4 shadow-sm rounded h-100">
                        <h4>صيانة اللابتوبات</h4>
                        <p>إصلاح وصيانة جميع أنواع اللابتوبات الاستيراد مع توفير قطع غيار أصلية.</p>
                        <img src="{{ asset('front/assets/images/spar 1.jpg') }}" alt="صيانة اللابتوبات"
                            class="img-fluid mt-3 rounded">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item text-center p-4 shadow-sm rounded h-100">
                        <h4>بيع لابتوبات استيراد</h4>
                        <p>نوفر لابتوبات استيراد بحالة ممتازة وبضمان حقيقي لتناسب احتياجاتك.</p>
                        <img src="{{ asset('front/assets/images/spare lap 2.avif') }}" alt="بيع لابتوبات استيراد"
                            class="img-fluid mt-3 rounded">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item text-center p-4 shadow-sm rounded h-100">
                        <h4>إكسسوارات أصلية</h4>
                        <p>جميع الإكسسوارات التي تحتاجها: شواحن، حقائب، ماوس وغير ذلك بجودة مضمونة.</p>
                        <img src="{{ asset('front/assets/images/spar accessory 3.png') }}" alt="إكسسوارات لابتوبات"
                            class="img-fluid mt-3 rounded">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Services Area Ends ***** -->

@endsection
