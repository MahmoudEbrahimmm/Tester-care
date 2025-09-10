@extends('layouts.front')

@section('content')
<div class="container py-5 mt-5">
    <h2 class="mb-4 text-center fw-bold wow fadeInDown mt-5" data-wow-delay="0.3s">سلة المشتريات</h2>

    <form action="{{route('checkout.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body"  id="cartProducts">
            <x-cartProducts />
        </div>
    </form>

</div>
@endsection 

@push('scripts')


@section('scripts')

    <script type="text/javascript">
        // updare cart
        $("body").on("change", ".quantity", function(e) {
            var elem = $(this);
            $.ajax({
                url: "{{route('cart.update')}}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    type: "update",
                    product_id: elem.parents("tr").attr("data-id"),
                    quantity: elem.val(),
                },
                success: function(response){
                    $("#cartProducts").html(response.success);
                    console.log(response);
                }
            });
        });
        // remove-from-cart
        $("body").on("click", ".remove-from-cart", function(e) {
            var elem = $(this);
            $.ajax({
                url: "{{route('cart.update')}}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    type: "delete",
                    product_id: elem.parents("tr").attr("data-id"),
                },
                success: function(response){
                    $("#cartProducts").html(response.success);
                    console.log(response);
                }
            });
        });
    </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
</script>
@endpush
