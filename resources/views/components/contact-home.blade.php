<div class="contact-us" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div id="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1709.2640925724656!2d31.36123434743926!3d31.039392441182187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1758191652632!5m2!1sen!2seg"
                        width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-heading text-center mb-4">
                    <h2 class="fw-bold">تواصل معنا في شركة <h2>Tester</h2></h2>
                    <h5 class="d-block mt-2" style="font-size: 16px; line-height: 1.8;">
                        نهتم بجميع استفساراتكم وملاحظاتكم، ونسعد دائمًا بالتواصل معكم لتقديم أفضل دعم وخدمة.
                        تواصلكم معنا هو سر نجاحنا واستمرارنا.
                    </h5>
                </div>

                <form id="contact" action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset>
                                <input name="name" type="text" id="name" placeholder="ادخل اسمك" required
                                    value="{{ old('name') }}" class="form-control">
                            </fieldset>
                        </div>
                        @error('name')
                            <div class=" text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="col-lg-6">
                            <fieldset>
                                <input name="email" type="email" id="email" placeholder="ادخل البريد الالكتروني"
                                    required value="{{ old('email') }}" class="form-control">
                            </fieldset>
                        </div>
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="col-lg-12">
                            <fieldset>
                                <textarea name="description" rows="6" id="message" placeholder="ادخل تفاصيل الرسالة" required class="text-dark form-control">{{ old('description') }}</textarea>
                            </fieldset>
                        </div>
                        @error('description')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-dark-button"><i
                                        class="fa fa-paper-plane"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
