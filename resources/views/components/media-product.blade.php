<div class="col-6 col-md-3 col-lg-2 mb-4">
    <div class="thumb position-relative overflow-hidden rounded-4 shadow-sm border-0 bg-white text-center"
         style="transition: all 0.3s ease;">
         
        <img src="{{ asset('uploads/'.$product->image) }}"
             alt="{{ $product->name }}" 
             class="img-fluid w-100 rounded-4"
             style="aspect-ratio: 1/1; object-fit: cover; transition: transform 0.4s ease;">

        <div class="icon position-absolute top-50 start-50 translate-middle text-center opacity-0"
             style="transition: all 0.4s ease;">
            <a href="https://www.instagram.com/ahmed.r2fat.1192?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
               class="text-decoration-none">
                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
                     style="width: 50px; height: 50px; box-shadow: 0 3px 10px rgba(0,0,0,0.15);">
                    <i class="fab fa-instagram fs-4 text-danger"></i>
                </div>
                <h6 class="fw-semibold text-dark mt-2 mb-0">{{ $product->name }}</h6>
            </a>
        </div>
    </div>
</div>

<!-- CSS -->
<style>
.thumb {
    position: relative;
    cursor: pointer;
    border-radius: 16px;
}
.thumb:hover img {
    transform: scale(1.08);
    filter: brightness(0.85);
}
.thumb:hover .icon {
    opacity: 1;
}
.thumb:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}
.icon a {
    color: inherit;
    transition: all 0.3s ease;
}
.icon a:hover {
    color: #e1306c;
}
@media (max-width: 768px) {
    .thumb img {
        height: 140px;
        aspect-ratio: 1/1;
    }
    .icon h6 {
        font-size: 14px;
    }
}
</style>
