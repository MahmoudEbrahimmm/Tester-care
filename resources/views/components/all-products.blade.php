<div class="item">
    <div class="thumb">
        <div class="hover-content">
            <ul>
                <li><a href="{{route('show.product',$product->slug)}}"><i class="fa fa-eye"></i></a></li>
                <li><a href="{{route('add.to.cart',$product->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
            </ul>
        </div>
        <img src="{{ asset('uploads/' . $product->image) }}" alt="">
    </div>
    <div class="down-content">
        <h4> {{ $product->name }} </h4>
        <span>$ {{ $product->price }}</span>
        <ul class="stars">
            <ul class="list-unstyled d-flex gap-3">
    <li>
        <a href="https://www.facebook.com/share/15LXLfbLJc/" target="_blank" class="text-primary">
            <i class="fab fa-facebook-f fa-lg"></i>
        </a>
    </li>
    <li>
        <a href="https://wa.me/01554866941" target="_blank" class="text-success">
            <i class="fab fa-whatsapp fa-lg"></i>
        </a>
    </li>
    <li>
        <a href="https://www.tiktok.com/@tester9471?_t=ZS-8zmaHzQWN62&_r=1" target="_blank" class="text-dark">
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
