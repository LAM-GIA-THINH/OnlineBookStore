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
                                        <a class="nav-link" id="orders-tab" href="{{route('user.orders')}}"><i
                                                class="fi-rs-shopping-bag mr-10"></i>Đơn hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('user.profile.edit')}}">
                                            <i class="fi-rs-user mr-10"></i>Thông tin tài khoản</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if (session('status'))
                        <div class="col-md-12 mb-3">
                            <div class="alert alert-success mb-3 col-md-12">
                                Cập nhật thành công.
                            </div>
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="col-md-12 mb-3">
                            <div class=" alert alert-danger mt-3 mb-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    @if($error === 'The email has already been taken.')
                                    <li>Email đã được sử dụng</li>
                                    @elseif($error === 'The password must be at least 8 characters.')
                                    <li>Mật khẩu phải có ít nhất 8 ký tự</li>
                                    @else
                                    <li>{{ $error }}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="account-detail" role="tabpanel"
                                    aria-labelledby="account-detail-tab">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5>Thông tin tài khoản</h5>
                                        </div>

                                        <div class="card-body">
                                            <form method="post" action="{{route('user.profile.update')}}">
                                                @csrf
                                                @method('put')
                                                <?php
                                                    if(isset(Auth::user()->address)) {
                                                        $address = explode(',', Auth::user()->address);
                                                        $length = count($address);
                                                    }
                                                ?>
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Họ tên<span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="name"
                                                            type="text" value="{{Auth::user()->name}}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Email<span class="required">*</span></label>
                                                        <input required="" class="form-control square"
                                                            name="order_email" type="email"
                                                            value="{{Auth::user()->order_email}}">
                                                    </div>
                                                    <label>Địa chỉ giao hàng <span class="required">*</span></label>
                                                    @if(Auth::user()->address)
                                                    <div class="form-group d-flex gap-3">
                                                        <select class="form-control form-select form-select-sm"
                                                            name="city" id="city" required aria-label=".form-select-sm">
                                                            <option value="" selected disabled>Chọn tỉnh thành *
                                                            </option>
                                                            <option value="{{
                                                                $address[$length-1]}}" selected>{{
                                                                $address[$length-1]}}
                                                            </option>
                                                        </select>

                                                        <select class="form-control form-select form-select-sm"
                                                            name="district" id="district" required
                                                            aria-label=".form-select-sm">
                                                            <option value="" disabled>Chọn tỉnh thành *</option>

                                                            <option value="{{
                                                                $address[$length-2]}}" selected>{{
                                                                    $address[$length-2]}}
                                                            </option>
                                                        </select>

                                                        <select class="form-control form-select form-select-sm"
                                                            name="ward" id="ward" required aria-label=".form-select-sm">
                                                            <option value="" disabled>Chọn tỉnh thành *</option>

                                                            <option value="{{
                                                                $address[$length-3]}}" selected>{{
                                                                    $address[$length-3]}}</option>
                                                        </select>
                                                    </div>
                                                    @else
                                                    <div class="form-group d-flex gap-3">
                                                        <select class="form-control form-select form-select-sm"
                                                            name="city" id="city" required aria-label=".form-select-sm">
                                                            <option value="" selected disabled>Chọn tỉnh
                                                                thành *
                                                            </option>
                                                        </select>

                                                        <select class="form-control form-select form-select-sm"
                                                            name="district" id="district" required
                                                            aria-label=".form-select-sm">
                                                            <option value="" selected disabled>Chọn quận
                                                                huyện *
                                                            </option>
                                                        </select>

                                                        <select class="form-control form-select form-select-sm"
                                                            name="ward" id="ward" required aria-label=".form-select-sm">
                                                            <option value="" selected disabled>Chọn phường xã
                                                                *</option>
                                                        </select>
                                                    </div>
                                                    @endif

                                                    <label>Tên đường số nhà <span class="required">*</span></label>
                                                    <div class="form-group">
                                                        <input type="text" name="address" required
                                                            placeholder="Số nhà, tên đường *"
                                                            value="{{implode(',',array_slice(explode(',', Auth::user()->address), 0, -3))}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>SĐT <span class="required">*</span></label>

                                                        <input required type="tel" name="phone" pattern="[0-9]{10,11}"
                                                            placeholder="Số điện thoại *"
                                                            value="{{Auth::user()->phone}}">
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
                                            <form method="post" action="{{route('password.update')}}">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Mật khẩu hiện tại <span class="required">*</span></label>
                                                        <input required="" class="form-control square"
                                                            name="current_password" type="password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Mật khẩu mới <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="password"
                                                            type="password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Nhập lại mật khẩu <span class="required">*</span></label>
                                                        <input required="" class="form-control square"
                                                            name="password_confirmation" type="password">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var cities = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function (result) {
        renderCity(result.data);

    });

    function renderCity(data) {
        for (const x of data) {
            cities.options[cities.options.length] = new Option(x.Name, x.Name);
        }
        cities.onchange = function () {
            district.length = 1;
            ward.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Name === this.value);

                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Name);
                }
            }
        };
        district.onchange = function () {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Name === cities.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Name);
                }
            }
        };
    }

</script>