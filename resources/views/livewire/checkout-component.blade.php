<div>
    @if (Cart::instance('cart')->count() == 0)
    @php
    redirect()->route('shop');
    @endphp
    @else
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
                                        @foreach (Cart::instance('cart')->content() as $item)
                                        <tr>
                                            <td class="image product-thumbnail"><img
                                                    src="{{ asset('assets/imgs/products/products') }}/{{ $item->model->image }}"
                                                    alt="#"></td>
                                            <td>
                                                <h5>
                                                    <a
                                                        href="{{ route('product.details',['slug'=>$item->model->slug]) }}">
                                                        {{ $item->model->name }}
                                                    </a>
                                                </h5>
                                                <span class="product-qty">x {{ $item->qty }}</span>
                                            </td>
                                            <td>{{number_format(intval(str_replace(',', '',$item->subtotal)))}} VND</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">{{number_format(intval(str_replace(',', '',Cart::subtotal())))}} VND</td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <td class="product-subtotal" colspan="2">{{number_format(intval(str_replace(',', '',Cart::tax())))}} VND</td>
                                        </tr>

                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em>30,000 VND</em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span
                                                class="font-xl text-brand fw-900">{{number_format(intval(str_replace(',', '',Cart::total())) +30000)}} VND</span></td>
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
                                    <div class="form-group">
                                        <input required="" type="text" name="email" placeholder="Email *">
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
                                    @foreach(Cart::instance('cart')->content() as $item)
                                    <input type="hidden" name="products[]"
                                        value="{{$item->model->id . ';' . $item->qty . ';' . $item->subtotal}}" />
                                    @endforeach
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                                    <input type="hidden" name="total"
                                        value="{{intval(str_replace(',', '', Cart::total())) +30000 }}" />
                                    <input type="hidden" name="sub_total" value="{{Cart::subtotal()}}" />
                                    <input type="hidden" name="tax" value="{{Cart::tax()}}" />
                                    <input type="hidden" name="shipping" value="30000" />


                                    <button type="submit" name="redirect" class="btn btn-fill-out btn-block mt-30">Place
                                        Order</button>
                                        @if ($errors->any())
                                        <div class=" alert alert-danger mt-3 mb-3">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                @if($error === 'The email has already been taken.')
                                                <li>Email đã được sử dụng</li>
                                                @else
                                                <li>{{ $error }}</li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endif
</div>