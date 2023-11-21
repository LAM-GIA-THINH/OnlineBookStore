<main class="main">
    <section class="pt-20 pb-20">
        <div class="container">
            <h3>
                {{$message}}
            </h3>
            @if(isset($order_id))
            <a href="{{route('order.detail.view', ['order_id' => $order_id])}}"
                class="btn btn-fill-out btn-block mt-30">Chi tiết đơn hàng</a>
            @endif
        </div>
    </section>

</main>