<div class="item">
    <div class="thumb">
        <div class="hover-content">
            <ul>
                <li><a href="{{ route('show.product', $product->slug) }}"><i class="fa fa-eye"></i></a></li>
                <li><a href="{{ route('add.to.cart', $product->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
            </ul>
        </div>
        <img src="{{ asset('uploads/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}"
            style="height: 250px; object-fit: cover;">

    </div>
    <div class="down-content">
        <h4>{{ $product->name }} </h4>
        <span class="mb-3">${{ $product->price }}</span>

        <div class="mt-auto d-flex justify-content-between">
            <a href="{{ route('show.product', $product->slug) }}" class="btn btn-outline-primary">
                <i class="fa fa-eye"></i>
            </a>
            <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-outline-warning">
                <i class="fa fa-shopping-cart"></i>
            </a>
        </div>

    </div>
</div>
