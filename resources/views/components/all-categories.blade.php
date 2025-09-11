<div class="item">
    <div class="thumb">
        
        <img src="{{ asset('storage/' . $category->image) }}" alt="">
    </div>
    <div class="down-content">
        <h4> {{ $category->name }} </h4>
        <p> {{ $category->description }} </p>
        <ul class="stars">
            <ul class="list-unstyled d-flex gap-3">
    <li>
        <a href="#" target="_blank" class="text-primary">
            <i class="fab fa-facebook-f fa-lg"></i>
        </a>
    </li>
    <li>
        <a href="https://wa.me/2010020258177" target="_blank" class="text-success">
            <i class="fab fa-whatsapp fa-lg"></i>
        </a>
    </li>
    <li>
        <a href="#" target="_blank" class="text-dark">
            <i class="fab fa-tiktok fa-lg"></i>
        </a>
    </li>
    <li>
        <a href="https://www.instagram.com/ahmed.r2fat.1192" target="_blank" class="text-danger">
            <i class="fab fa-instagram fa-lg"></i>
        </a>
    </li>
</ul>

        </ul>
    </div>
</div>
