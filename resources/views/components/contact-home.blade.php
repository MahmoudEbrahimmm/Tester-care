<!-- ***** Contact Us Section Start ***** -->
<div class="contact-us py-5" id="contact" dir="rtl" style="background-color: #fff;">
    <div class="container">
        <div class="row align-items-center">

            <!-- Google Map -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div id="map" class="shadow-sm rounded overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1709.2640925724656!2d31.36123434743926!3d31.039392441182187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1758191652632!5m2!1sen!2seg"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-6">
                <div class="section-heading text-center mb-4">
                    <h2 class="fw-bold mb-3" style="color:#f39c12;">تواصل معنا  <span style="color:#333;"></span></h2>
                    <p class="text-muted" style="font-size: 16px; line-height: 1.8;">
                        نهتم بجميع استفساراتكم وملاحظاتكم، ونسعد دائمًا بالتواصل معكم لتقديم أفضل دعم وخدمة.
                        تواصلكم معنا هو سر نجاحنا واستمرارنا.
                    </p>
                </div>

                <form id="contact" action="{{ route('contact.store') }}" method="post" class="text-end">
                    @csrf
                    <div class="row g-3">

                        <!-- Name -->
                        <div class="col-lg-6">
                            <input name="name" type="text" id="name" placeholder="ادخل اسمك"
                                value="{{ old('name') }}" required class="form-control border-2 rounded-3">
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-lg-6">
                            <input name="email" type="email" id="email" placeholder="ادخل البريد الإلكتروني"
                                value="{{ old('email') }}" required class="form-control border-2 rounded-3">
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Message -->
                        <div class="col-lg-12">
                            <textarea name="description" rows="6" id="message" placeholder="ادخل تفاصيل الرسالة"
                                required class="form-control border-2 rounded-3 text-dark">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="col-lg-12 text-center mt-3">
                            <button type="submit" id="form-submit"
                                class="btn px-4 py-2 text-white fw-bold rounded-3"
                                style="background-color:#f39c12; border:none; transition:0.3s;">
                                <i class="fa fa-paper-plane me-2"></i> إرسال
                            </button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- ***** Contact Us Section End ***** -->

<!-- Optional: hover effect -->
<style>
    #form-submit:hover {
        background-color: #d9820e !important;
    }
    input::placeholder, textarea::placeholder {
        color: #999 !important;
    }
</style>
