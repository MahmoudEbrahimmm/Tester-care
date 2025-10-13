@extends('layouts.front')
@section('page-url', 'عن الشركة')
@section('content')
    <!-- ***** About Area Starts ***** -->
    <div class="about-us py-5 bg-light" dir="rtl">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10 m-auto">
                    <div class="right-content text-end shadow p-5 rounded bg-white">
                        <h2 class="fw-bold mb-3 text-primary">من نحن</h2>
                        <p class="mb-4 fs-5 text-muted">
                            شركة <strong class="text-dark">Tester</strong> متخصصة في تقديم خدمات صيانة اللابتوبات
                            الاستيراد بأعلى جودة بالإضافة إلى بيع أجهزة لابتوب استيراد مضمونة وإكسسوارات أصلية.
                        </p>
                        <div class="quote p-4 rounded mb-4">
                            
                            <p class="d-inline-block mb-0 fw-semibold ">
                                هدفنا تقديم منتجات وخدمات موثوقة تلبي احتياجات عملائنا وتساعدهم على إنجاز أعمالهم بكفاءة.
                            </p>
                        </div>
                        <p class="text-muted">
                            نتميز بتوفير أفضل أجهزة <strong>اللابتوبات الاستيراد</strong> بأسعار مناسبة وبضمان حقيقي، إلى
                            جانب فريق متخصص في <strong>صيانة الأجهزة</strong> واكتشاف الأعطال وحلها بسرعة وكفاءة.  
                            كما نوفر مجموعة متنوعة من <strong>الإكسسوارات الأصلية</strong> مثل الشواحن، الحقائب، والماوس.
                        </p>
                        <ul class="list-unstyled d-flex gap-4 justify-content-end mt-4 fs-4">
                            <li><a href="#" target="_blank" class="text-primary hover-opacity"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://wa.me/2010020258177" target="_blank" class="text-success hover-opacity"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a href="#" class="text-dark hover-opacity"><i class="fab fa-tiktok"></i></a></li>
                            <li><a href="https://www.instagram.com/ahmed.r2fat.1192" target="_blank" class="text-danger hover-opacity"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Our Team Area Starts ***** -->
    <section class="our-team py-5">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="fw-bold text-primary">فريقنا</h2>
                <h5 class="text-muted">فنيون محترفون بخبرة طويلة في صيانة وبيع اللابتوبات</h5>
            </div>
            <div class="row">
                @foreach ($category_about as $category)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="team-item shadow rounded overflow-hidden bg-white h-100 text-center transition hover-shadow-lg">
                            <div class="thumb position-relative">
                                <img src="{{ asset('uploads/' . $category->image) }}" alt="{{ $category->name }}"
                                    class="img-fluid w-100" style="height: 280px; object-fit: cover;">
                                <div class="hover-effect position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center opacity-0 transition hover-opacity-100">
                                    <ul class="list-unstyled d-flex gap-3 fs-5">
                                        <li><a href="https://www.facebook.com/share/15LXLfbLJc/" target="_blank" class="text-white"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://wa.me/01554866941" target="_blank" class="text-success"><i class="fab fa-whatsapp"></i></a></li>
                                        <li><a href="https://www.tiktok.com/@tester9471" class="text-white"><i class="fab fa-tiktok"></i></a></li>
                                        <li><a href="https://www.instagram.com/ahmed.r2fat.1192" target="_blank" class="text-danger"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="down-content p-3 text-end">
                                <h4 class="fw-bold">{{ $category->name }}</h4>
                                <p class="text-muted">{{ $category->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Our Team Area Ends ***** -->

    <!-- ***** Services Area Starts ***** -->
    <section class="our-services py-5 bg-light">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="fw-bold text-primary">خدماتنا</h2>
                <h5 class="text-muted">كل ما تحتاجه في مكان واحد</h5>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item text-center p-4 shadow rounded bg-white h-100 transition hover-shadow-lg">
                        <h4 class="fw-bold mb-3 text-dark">صيانة اللابتوبات</h4>
                        <p class="text-muted">إصلاح وصيانة جميع أنواع اللابتوبات الاستيراد مع توفير قطع غيار أصلية.</p>
                        <img src="{{ asset('front/assets/images/spar 1.jpg') }}" alt="صيانة اللابتوبات"
                            class="img-fluid mt-3 rounded">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item text-center p-4 shadow rounded bg-white h-100 transition hover-shadow-lg">
                        <h4 class="fw-bold mb-3 text-dark">بيع لابتوبات استيراد</h4>
                        <p class="text-muted">نوفر لابتوبات استيراد بحالة ممتازة وبضمان حقيقي لتناسب احتياجاتك.</p>
                        <img src="{{ asset('front/assets/images/spare lap 2.avif') }}" alt="بيع لابتوبات استيراد"
                            class="img-fluid mt-3 rounded">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item text-center p-4 shadow rounded bg-white h-100 transition hover-shadow-lg">
                        <h4 class="fw-bold mb-3 text-dark">إكسسوارات أصلية</h4>
                        <p class="text-muted">جميع الإكسسوارات التي تحتاجها: شواحن، حقائب، ماوس وغير ذلك بجودة مضمونة.</p>
                        <img src="{{ asset('front/assets/images/spar accessory 3.png') }}" alt="إكسسوارات لابتوبات"
                            class="img-fluid mt-3 rounded">
                    </div>
                </div>
            </div>
            <!-- معلومات إضافية + الخريطة -->
            <div class="row align-items-center mt-5">
                <div class="col-md-10 m-auto text-center">
                    <h2 class="fw-bold text-primary">عن شركة Tester</h2>
                    <h5 class="mt-3 text-muted mb-3">خبرة واحترافية في صيانة وبيع اللابتوبات الاستيراد والإكسسوارات</h5>
                </div>
                <div class="col-lg-8 m-auto mt-4">
                    <div class="shadow rounded overflow-hidden">
                        <div id="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1709.2640925724656!2d31.36123434743926!3d31.039392441182187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1758191652632!5m2!1sen!2seg"
                                width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Services Area Ends ***** -->

@endsection
