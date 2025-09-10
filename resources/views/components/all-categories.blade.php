<div class="item">
    <div class="thumb">
        
        <img src="{{ asset('storage/' . $category->image) }}" alt="">
    </div>
    <div class="down-content">
        <h4> {{ $category->name }} </h4>
        <p> {{ $category->description }} </p>
        <ul class="stars">
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
        </ul>
    </div>
</div>
