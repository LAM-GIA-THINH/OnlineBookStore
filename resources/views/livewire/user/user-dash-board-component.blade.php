<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Trang chủ</a>
                <span></span> Trang cá nhân
            </div>
        </div>
    </div>
    <section class="pt-4 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-row" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="orders-tab" data-bs-toggle="tab" href="#orders"
                                            role="tab" aria-controls="orders" aria-selected="false"><i
                                                class="fi-rs-shopping-bag mr-10"></i>Đơn hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab"
                                            href="#account-detail" role="tab" aria-controls="account-detail"
                                            aria-selected="true"><i class="fi-rs-user mr-10"></i>Thông tin tài khoản</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="orders" role="tabpanel"
                                    aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Đơn hàng của bạn</h5>
                                        </div>
                                        <div class="card-body">
                                            @if($orders->count() !== 0)
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>Mã đơn</th>
                                                            <th>Phương thức thanh toán</th>
                                                            <th>Trạng thái đơn hàng</th>
                                                            <th>Tổng tiền</th>
                                                            <th>Ngày tạo</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($orders as $order)
                                                        <tr class="text-center">
                                                            <td>{{$order->id}}</td>
                                                            <td> @if($order->payment_method == 'cod')
                                                                Thanh toán khi giao hàng
                                                                @elseif($order->payment_method == 'vnp')
                                                                Chuyển khoản
                                                                @endif
                                                            </td>
                                                            <td> @if($order->order_status == 0)
                                                                Chờ duyệt
                                                                @elseif($order->order_status == 1)
                                                                Đã duyệt
                                                                @elseif($order->order_status == 2)
                                                                Đang giao
                                                                @elseif($order->order_status == 3)
                                                                Hoàn thành
                                                                @elseif($order->order_status == 4)
                                                                Đã huỷ
                                                                @endif
                                                            </td>

                                                            <td>{{ number_format($order->amount, 0, ',', ',') }} VND
                                                            </td>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>
                                                                <a href="{{route('order.detail.view', ['order_id' => $order->id])}}"
                                                                    class="btn-small d-block">Xem chi tiết</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{$orders->links('pagination::bootstrap-4')}}
                                            </div>
                                            @else
                                                <h5>Không có đơn hàng</h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel"
                                    aria-labelledby="account-detail-tab">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5>Thông tin tài khoản</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" name="enq">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Họ tên <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="dname"
                                                            type="text" value="{{Auth::user()->name}}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Email <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="email"
                                                            type="email" value="{{Auth::user()->email}}">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit"
                                                            name="submit" value="Submit">Lưu</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @if (Auth::user()->provider_id === NULL)
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Đổi mật khẩu</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" name="enq">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Mật khẩu hiện tại <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="password"
                                                            type="password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Mật khẩu mới <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="npassword"
                                                            type="password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Nhập lại mật khẩu <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="cpassword"
                                                            type="password">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit"
                                                            name="submit" value="Submit">Lưu</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>