
<div>
    <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Trang chủ</a>
                        <span></span> Cập nhật trạng thái đơn hàng
                    </div>
                </div>
            </div>
            <section class="mt-50 mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                        Cập nhật trạng thái đơn hàng
                                        </div>
                                        <div class="col-md-6">
                                        <a href="{{route('admin.orders')}}" class="btn btn-success float-end">Tất cả đơn hàng</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                    @endif
                                    <form wire:submit.prevent="updateOrder">
                                    <div class="mb-3 mt-3">
                                        <label for="order_id" class="form-label">Mã đơn hàng</label>
                                        <input type="text" name="order_id" class="form-control"  wire:model="order_id" readonly/>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Tên khách hàng</label>
                                        <input type="text" name="name" class="form-control"  wire:model="name" readonly/>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="user_id" class="form-label">Mã khách hàng</label>
                                        <input type="text" name="user_id" class="form-control"  wire:model="user_id" readonly/>                                     
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="phone" class="form-label">Số điện thoại</label>
                                        <input class="form-control"  name="phone"  wire:model="phone" readonly></input>
                                    </div>  
                                    <div class="mb-3 mt-3">
                                        <label for="address" class="form-label">Điạ chỉ</label>
                                        <input type="text" name="address" class="form-control"  wire:model="address" readonly/>                                    
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="note" class="form-label">Ghi chú</label>
                                        <input type="text" name="note" class="form-control"  wire:model="address" readonly/>                                    
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="payment_method" class="form-label" >Phương thức thanh toán</label>
                                        <input type="text" name="payment_method" class="form-control"  wire:model="payment_method" readonly/>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="payment_method" class="form-label" wire:model="payment_method">Phương thức thanh toán</label>
                                            <select class="form-control" name="payment_method" wire:model="payment_method" readonly>
                                                <option value="cod">Thanh toán khi giao hàng</option>
                                                <option value="vnpay">Chuyển khoản</option>
                                            </select>
                                    </div>   

                                    <div class="mb-3 mt-3">
                                        <label for="payment_status" class="form-label" wire:model="payment_status">Trạng thái thanh toán</label>
                                            <select class="form-control" name="payment_status" wire:model="payment_status" readonly>
                                                <option value="0">Chưa thanh toán</option>
                                                <option value="1">Đã thanh toán</option>
                                            </select>
                                    </div>   
                                    <div class="mb-3 mt-3">
                                        <label for="sub_total" class="form-label">Số tiền</label>
                                        <input type="text" name="sub_total" class="form-control"  wire:model="sub_total" readonly>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="tax" class="form-label">Thuế</label>
                                        <input type="text" name="tax" class="form-control"  wire:model="tax" readonly>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="shipping" class="form-label">Tiền ship</label>
                                        <input type="text" name="shipping" class="form-control"  wire:model="shipping" readonly>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="amount" class="form-label">Tổng tiền</label>
                                        <input type="text" name="amount" class="form-control"  wire:model="amount" readonly>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="tracking" class="form-label">Vận chuyển</label>
                                        <input type="text" name="tracking" class="form-control"  wire:model="tracking" @if($order_status != '2') readonly @endif>
                                    </div>         
                                    <div class="mb-3 mt-3">
                                        <label for="order_status" class="form-label" wire:model="order_status">Trạng thái đơn hàng</label>
                                            <select class="form-control" name="order_status" wire:model="order_status" >
                                                <option value="0">Chờ duyệt</option>
                                                <option value="1">Duyệt</option>
                                                <option value="2">Đang giao hàng</option>
                                                <option value="3">Hoàn thành</option>
                                                <option value="4">Huỷ</option>
                                            </select>
                                    </div>   
                                                                                                                               
                                        <button type="submit" class="btn btn-primary float-end">Cập nhật</button>
                                </form>
                                </div>
                                @livewireScripts
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>
