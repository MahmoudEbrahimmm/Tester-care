<div class="item bg-white rounded-4 shadow-sm overflow-hidden border-0 text-center p-3 position-relative"
     style="transition: all 0.4s ease; cursor: pointer;">
    
    <div class="thumb overflow-hidden rounded-4 position-relative">
        <img src="{{ asset('uploads/' . $category->image) }}"
             alt="{{ $category->name }}" 
             class="w-100" 
             style="height: 220px; object-fit: cover; transition: transform 0.5s ease;">
    </div>

    <div class="down-content mt-3">
        <h4 class="fw-bold text-dark mb-2">{{ $category->name }}</h4>
        <p class="text-muted small mb-3">{{ $category->description }}</p>

        <ul class="list-unstyled d-flex justify-content-center gap-3 mb-0">
            <li>
                <a href="https://www.facebook.com/share/15LXLfbLJc/" target="_blank" 
                   class="text-primary d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                   style="width: 40px; height: 40px; transition: all 0.3s ease;">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li>
                <a href="https://wa.me/01554866941" target="_blank" 
                   class="text-success d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                   style="width: 40px; height: 40px; transition: all 0.3s ease;">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </li>
            <li>
                <a href="https://www.tiktok.com/@tester9471?_t=ZS-8zmaHzQWN62&_r=1" target="_blank" 
                   class="text-dark d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                   style="width: 40px; height: 40px; transition: all 0.3s ease;">
                    <i class="fab fa-tiktok"></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/ahmed.r2fat.1192" target="_blank" 
                   class="text-danger d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                   style="width: 40px; height: 40px; transition: all 0.3s ease;">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- CSS -->
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
@media (max-width: 768px) {
    .item {
        padding: 1rem;
    }
    .item img {
        height: 160px;
    }
}
</style>
