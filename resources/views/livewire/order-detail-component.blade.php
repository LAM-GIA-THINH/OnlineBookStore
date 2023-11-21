<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Trang chủ</a>
                    <span></span> Shop
                    <span></span> Thông tin đơn hàng
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="order_review">
                            <div class="mb-20">
                                @php
                                $badgeClass = [
                                '0' => 'bg-secondary', // Chờ duyệt
                                '1' => 'bg-success', // Đã duyệt
                                '2' => 'bg-info', // Đang giao hàng
                                '3' => 'bg-primary', // Hoàn thành
                                '4' => 'bg-danger', // Đã hủy
                                ];

                                $orderStatuses = [
                                '0' => 'Chờ duyệt',
                                '1' => 'Đã duyệt',
                                '2' => 'Đang giao hàng',
                                '3' => 'Hoàn thành',
                                '4' => 'Đã hủy',
                                ];
                                @endphp
                                <h4>Thông tin đơn hàng
                                    <span class="badge {{$badgeClass[$order->order_status] ?? 'bg-secondary'}}">
                                        {{$orderStatuses[$order->order_status] ?? 'Chờ duyệt'}}
                                    </span>
                                </h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Các sản phẩm</th>
                                            <th>Tổng tiền</th>
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
                                            <td>{{$item->amount}} VND</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th>Tổng tiền các sản phẩm</th>
                                            <td class="product-subtotal" colspan="2">{{$order->sub_total}} VND</td>
                                        </tr>
                                        <tr>
                                            <th>Thuế</th>
                                            <td class="product-subtotal" colspan="2">{{$order->tax}} VND</td>
                                        </tr>

                                        <tr>
                                            <th>Phí giao hàng</th>
                                            <td colspan="2"><em>{{$order->shipping}} VND</em></td>
                                        </tr>
                                        <tr>
                                            <th>Tổng cộng</th>
                                            <td colspan="2" class="product-subtotal"><span
                                                    class="font-xl text-brand fw-900">{{$order->amount}} VND</span></td>
                                        </tr>
                                        <tr>
                                            <th>Tình trạng vận chuyển</th>
                                            <td colspan="2"><a href="{{$order->tracking}}">{{$order->tracking}}</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="mb-25">
                                <h5>Thông tin thanh toán</h5>
                            </div>
                            <div class="form-group">
                                <input type="text" value="Họ tên: {{$order->name}}" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" value="Địa chỉ: {{$order->address}}" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" value="SĐT: {{$order->phone}}" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text"
                                    value="PT Thanh toán: {{$order->payment_method == 'cod' ? 'Thanh toán khi nhận hàng' : 'VNPay'}}"
                                    disabled>
                            </div>


                            <div class="mb-20">
                                <h5>Ghi chú</h5>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" disabled>{{$order->note}}</textarea>
                            </div>
                            @if ($order->order_status == 0)
                            <form method="POST" action="{{ route('order.cancel', ['order_id' => $order->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-fill-out btn-block mt-30">Huỷ đơn hàng</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>