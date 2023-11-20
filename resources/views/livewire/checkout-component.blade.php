<div>
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
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
                                    @foreach(Cart::instance('cart')->content() as $item)
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{asset('assets/imgs/products/products')}}/{{$product->image}}" alt="#"></td>
                                            <td>
                                                <h5><a href="{{route('product.details',['slug'=>$rproduct->slug])}}">{{substr($item->model->name,0,50)}}...</a></h5> <span class="product-qty">x {{$item->qty}}</span>
                                            </td>
                                            <td>{{$item->subtotal}}VND</td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">{{Cart::subtotal()}}VND</td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <td class="product-subtotal" colspan="2">{{Cart::tax()}}VND</td>
                                        </tr>

                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em>Free Shipping</em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">{{Cart::total()}}VND</span></td>
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
                                        <input type="text" required="" name="fullName" placeholder="Full name *">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" required="" placeholder="Address *">
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="text" name="phone" placeholder="Phone *">
                                    </div>

                                    <div class="mb-20">
                                        <h5>Additional information</h5>
                                    </div>
                                    <div class="form-group mb-30">
                                        <textarea rows="5" name="note" placeholder="Order notes"></textarea>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option"
                                            id="exampleRadios3" value="cod">
                                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse"
                                            data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Cash On
                                            Delivery</label>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" checked type="radio"
                                            name="payment_option" id="exampleRadios5" value="vnp">
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse"
                                            data-target="#vnp" aria-controls="vnp">VN Pay</label>
                                    </div>
                                    <input type="hidden" name="total" value="20000" />
                                    <input type="hidden" name="orderId" value="{{rand(00000, 99999)}}" />
                                    <button type="submit" name="redirect" class="btn btn-fill-out btn-block mt-30">Place
                                        Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
