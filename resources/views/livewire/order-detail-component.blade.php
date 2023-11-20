<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> OrderDetail
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderItems as $item)
                                        <tr>
                                            <td class="image product-thumbnail"><img
                                                    src="{{asset('assets/imgs/products/products')}}/{{$products[$item->product_id]->image}}"
                                                    alt="#"></td>
                                            <td>
                                                <h5><a
                                                        href="{{route('product.details',['slug'=>$products[$item->product_id]->slug])}}">{{$products[$item->product_id]->name}}</a>
                                                </h5> <span class="product-qty">x {{$item->quantity}}</span>
                                            </td>
                                            <td>{{$item->amount}}VND</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">{{$order->sub_total}}VND</td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <td class="product-subtotal" colspan="2">{{$order->tax}}VND</td>
                                        </tr>

                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em>{{$order->shipping}}VND</em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span
                                                    class="font-xl text-brand fw-900">{{$order->amount}}VND</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Payment</h5>
                                </div>
                                <form method="POST" action="{{route('user.payment')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" required="" name="fullName" placeholder="Full name *"
                                            value="{{$order->name}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" required="" placeholder="Address *"
                                            value="{{$order->address}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="text" name="phone" placeholder="Phone *"
                                            value="{{$order->phone}}" disabled>
                                    </div>

                                    <div class="mb-20">
                                        <h5>Additional information</h5>
                                    </div>
                                    <div class="form-group mb-30">
                                        <textarea rows="5" name="note" placeholder="Order notes"
                                            disabled>{{$order->note}}</textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>