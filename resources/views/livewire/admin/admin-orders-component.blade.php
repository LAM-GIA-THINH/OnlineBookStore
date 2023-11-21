<div>
    <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Trang chủ</a>
                        <span></span> Tất cả đơn hàng
                    </div>
                </div>
            </div>
            <section class="mt-50 mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            <div class="card-header"> 
                                <div class="row align-items-center">
                                    <div class="p-2">
                                        <h4 class="mb-0">Tất cả đơn hàng</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input wire:model="search" type="text" class="form-control" placeholder="Tìm kiếm bằng tên hoặc mã đơn..." style="border: 1px solid #ccc; border-radius: 4px;">
                                            <button wire:click="clearSearch" class="btn btn-secondary btn-sm">Xoá</button>
                                        </div>
                                        <div class="row mt-2">
                                        <div class="col-md-4">
                                            <div style="height: 50px;">
                                                <select wire:model="filterPaymentStatus" class="form-control" style="width: 180px;border: 1px solid #ccc; border-radius: 4px;">
                                                    <option value="">Trạng thái thanh toán ▼</option>
                                                    <option value="0">Chưa thanh toán</option>
                                                    <option value="1">Đã thanh toán</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div style="height: 50px;">
                                                <select wire:model="filterorderStatus" class="form-control" style="width: 180px;border: 1px solid #ccc; border-radius: 4px;" >
                                                    <option value="">Trạng thái đơn hàng ▼</option>
                                                    <option value="0">Chờ duyệt</option>
                                                    <option value="1">Đã duyệt</option>
                                                    <option value="2">Đang giao hàng</option>
                                                    <option value="3">Hoàn thành</option>
                                                    <option value="4">Đã huỷ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    </div>
                                </div>
                            </div>
                                <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="text-center">
                                                <th>Mã đơn</th>
                                                <th>Tên khách hàng</th>
                                                <th>Số điện thoại</th>
                                                <th>Phương thức thanh toán</th>
                                                <th>Trạng thái thanh toán</th>
                                                <th>Trạng thái đơn hàng</th>
                                                
                                                <th>Tổng tiền</th>
                                                <th>Ngày tạo</th>
                                                <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                    <tr class="text-center">
                                                    <td>{{$order->id}}</td>
                                                    <td>{{$order->name}}</td>
                                                    <td>{{$order->phone}}</td>
                                                    <td>    @if($order->payment_method == 'cod')
                                                            Thanh toán khi giao hàng
                                                        @elseif($order->payment_method == 'vnpay')
                                                            Chuyển khoản
                                                        @endif
                                                    </td>
                                                    <td>    @if($order->payment_status == 0)
                                                                Chưa thanh toán
                                                            @elseif($order->payment_status == 1)
                                                                Đã thanh toán
                                                            @endif
                                                    </td>
                                                    <td>    @if($order->order_status == 0)
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
                                                    
                                                    <td>{{ number_format($order->amount, 0, ',', ',') }} VND</td>
                                                    <td>{{$order->created_at}}</td>
                                                    <td>
                                                    <a href="{{route('admin.order.edit', ['order_id'=>$order->id])}}" class="text-info">Cập nhật</a>
                                                    </td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                        {{$orders->links('pagination::bootstrap-4')}}
                                </div>
                                @livewireScripts
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>
</div>



