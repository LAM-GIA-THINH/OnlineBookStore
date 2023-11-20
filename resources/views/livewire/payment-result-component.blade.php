<main class="main">
    <section class="pt-20 pb-20">
        <div class="container">
            <h3>
                {{$message}}
            </h3>
            @if(isset($order_id))
            <a href="/order-detail/?id={{$order_id}}" name="redirect" class="btn btn-fill-out btn-block mt-30">Order
                detail</a>
            @endif
        </div>
    </section>

</main>