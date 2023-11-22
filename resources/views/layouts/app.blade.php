<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Book Store</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/theme/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Add this script after including the Bootstrap Datepicker JS -->
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy', // Use the desired date format
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
    @livewireScripts
</head>

<body>
    
    <header class="header-area header-style-1 header-height-2">
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="index.html"><img src="assets/imgs/logo/logo.png" alt="logo"></a>
                    </div>
                    <div class="header-right">
                        @livewire('search')
                        <div class="header-action-right">
                            <div class="header-action-2">
                                @livewire('wishlist-icon-component')
                                @livewire('cart-icon-component')
                                <!-- <div class="search-style-1">
                            <form action="#">                                
                                <input type="text" placeholder="Tìm kiếm sản phẩm...">
                            </form>
                        </div> -->
                                <div class="header-action-right">
                                    <div class="header-action-2">
                                        @auth
                                        <ul style="font-size: 16px;">
                                            <li><i class="fi-rs-user"></i> {{ Auth::user()->name }} /
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a href="{{ route('logout') }}"
                                                        onClick="event.preventDefault(); this.closest('form').submit();">Đăng
                                                        xuất</a>
                                                </form>
                                            </li>
                                        </ul>
                                        @else
                                        <ul style="font-size: 16px;">
                                            <li><i class="fi-rs-key"></i><a href="{{ route('login') }}">Đăng nhập </a> /
                                                <a href="{{ route('register') }}">Đăng ký</a></li>
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-bottom-bg-color sticky-bar">
                    <div class="container">
                        <div class="header-wrap header-space-between position-relative">
                            <div class="logo logo-width-1 d-block d-lg-none">
                                <a href="index.html"><img src="assets/imgs/logo/logo.png" alt="logo"></a>
                            </div>
                            <div class="header-nav d-none d-lg-flex">

                                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                                    <nav>
                                        <ul>
                                            <li><a class="active" href="/">Trang chủ </a></li>
                                            <li class="position-static"><a href="#">Danh mục <i
                                                        class="fi-rs-angle-down"></i></a>
                                                <ul class="mega-menu">
                                                    <li class="sub-mega-menu sub-mega-menu-width-22">
                                                        <a class="menu-title" href="#">Truyện chữ</a>
                                                        <ul>
                                                            <li><a href="{{ route('product.category', ['slug' => 'truyen-chu-han-quoc']) }}">Truyện chữ Hàn Quốc</a>
                                                            </li>
                                                            <li><a href="{{ route('product.category', ['slug' => 'truyen-chu-nhat-ban']) }}">Truyện chữ Nhật Bản</a>
                                                            </li>
                                                            <li><a href="{{ route('product.category', ['slug' => 'truyen-chu-phuong-tay']) }}">Truyện chữ Phương Tây</a>
                                                            </li>
                                                            <li><a href="{{ route('product.category', ['slug' => 'truyen-chu-viet-nam']) }}">Truyện chữ Việt Nam</a>
                                                            </li>
                                                            <li><a href="{{ route('product.category', ['slug' => 'truyen-chu-trung-quoc']) }}">Truyện chữ Trung Quốc</a>
                                                            </li>

                                                        </ul>
                                                    </li>
                                                    <li class="sub-mega-menu sub-mega-menu-width-22">
                                                        <a class="menu-title" href="#">Truyện tranh</a>
                                                        <ul>
                                                            <li><a href="{{ route('product.category', ['slug' => 'truyen-tranh-han-quoc']) }}">Truyện tranh Hàn Quốc</a>
                                                            </li>
                                                            <li><a href="{{ route('product.category', ['slug' => 'truyen-tranh-nhat-ban']) }}">Truyện tranh Nhật Bản</a>
                                                            </li>
                                                            <li><a href="{{ route('product.category', ['slug' => 'truyen-tranh-phuong-tay']) }}">Truyện tranh Phương
                                                                    Tây</a></li>
                                                            <li><a href="{{ route('product.category', ['slug' => 'truyen-tranh-viet-nam']) }}">Truyện tranh Việt Nam</a>
                                                            </li>
                                                            <li><a href="{{ route('product.category', ['slug' => 'truyen-tranh-trung-quoc']) }}">Truyện tranh Trung
                                                                    Quốc</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-mega-menu sub-mega-menu-width-22">
                                                        <a class="menu-title" href="#">Khác</a>
                                                        <ul>
                                                            <li><a href="{{ route('product.category', ['slug' => 'artbook']) }}">Art Book</a></li>
                                                            <li><a href="{{ route('product.category', ['slug' => 'truyen-chon-bo']) }}">Truyện chọn bộ</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            @auth
                                            @if(Auth::user()->utype == 'ADM')
                                            <li><a href="#">Quản lý<i class="fi-rs-angle-down"></i></a>
                                                
                                                <ul class="sub-menu">
                                                    <li><a href="{{route('admin.orders')}}">Đơn hàng</a></li>
                                                    <li><a href="{{route('admin.products')}}">Sản phẩm</a></li>
                                                    <li><a href="{{route('admin.categories')}}">Danh mục</a></li>
                                                    <li><a href="{{route('admin.authors')}}">Tác giả</a></li>
                                                    <li><a href="{{route('admin.publishers')}}">Nhà phát hành</a></li>
                                                </ul>

                                                </li>
                                                @else
                                                <li><a href="#">Tài khoản<i class="fi-rs-angle-down"></i></a>
                                                
                                                <ul class="sub-menu">
                                                    <li><a href="{{route('user.dashboard')}}">Trang cá nhân</a></li>
                                                </ul>

                                                </li>
                                                @endif
                                            @endif

                                            <li><a href="{{route('shop')}}">Shop</a></li>
                                            <li><a href="{{route('about')}}">Về website</a></li>
                                            <li><a href="{{route('blog')}}">Blog </a></li>
                                            
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="hotline d-none d-lg-block">
                                <p><i class="fi-rs-smartphone"></i><span>Toll Free</span> (+84) 0966-948-914 </p>
                            </div>
                            <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up
                                to 40%
                            </p>
                            <div class="header-action-right d-block d-lg-none">
                                <div class="header-action-2">
                                    <div class="header-action-icon-2">
                                        <a href="shop-wishlist.php">
                                            <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-heart.svg">
                                            <span class="pro-count white">4</span>
                                        </a>
                                    </div>
                                    <div class="header-action-icon-2">
                                        <a class="mini-cart-icon" href="cart.html">
                                            <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-cart.svg">
                                            <span class="pro-count white">2</span>
                                        </a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            <ul>
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="product-details.html"><img alt="Surfside Media"
                                                                src="assets/imgs/shop/thumbnail-3.jpg"></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                                        <h3><span>1 × </span>$800.00</h3>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="product-details.html"><img alt="Surfside Media"
                                                                src="assets/imgs/shop/thumbnail-4.jpg"></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                                        <h3><span>1 × </span>$3500.00</h3>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <h4>Total <span>$383.00</span></h4>
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="cart.html">View cart</a>
                                                    <a href="shop-checkout.php">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header-action-icon-2 d-block d-lg-none">
                                        <div class="burger-icon burger-icon-white">
                                            <span class="burger-icon-top"></span>
                                            <span class="burger-icon-mid"></span>
                                            <span class="burger-icon-bottom"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="assets/imgs/logo/logo.png" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">

                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                <li><a href="shop.html"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a></li>
                                <li> <a href="shop.html"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer & Office</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                    href="index.html">Home</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                    href="shop.html">shop</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our
                                    Collections</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                            href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Dresses</a></li>
                                            <li><a href="product-details.html">Blouses & Shirts</a></li>
                                            <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="product-details.html">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                            href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Jackets</a></li>
                                            <li><a href="product-details.html">Casual Faux Leather</a></li>
                                            <li><a href="product-details.html">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                            href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Gaming Laptops</a></li>
                                            <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                            <li><a href="product-details.html">Tablets</a></li>
                                            <li><a href="product-details.html">Laptop Accessories</a></li>
                                            <li><a href="product-details.html">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                    href="blog.html">Blog</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a href="contact.html"> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="login.html">Log In </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="register.html">Sign Up</a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#">(+1) 0000-000-000 </a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    {{$slot}}

    <footer class="main">
        <section class="newsletter p-30 text-white wow fadeIn animated">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-md-3 mb-lg-0">
                        <div class="row align-items-center">
                            <div class="col flex-horizontal-center">
                                <img class="icon-email" src="assets/imgs/theme/icons/icon-email.svg" alt="">
                                <h4 class="font-size-20 mb-0 ml-3">Sign up to Newsletter</h4>
                            </div>
                            <div class="col my-4 my-md-0 des">
                                <h5 class="font-size-15 ml-4 mb-0">...and receive <strong>$25 coupon for first
                                        shopping.</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- Subscribe Form -->
                        <form class="form-subcriber d-flex wow fadeIn animated">
                            <input type="email" class="form-control bg-white font-small" placeholder="Enter your email">
                            <button class="btn bg-dark text-white" type="submit">Subscribe</button>
                        </form>
                        <!-- End Subscribe Form -->
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="index.html"><img src="assets/imgs/logo/logo.png" alt="logo"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                            <p class="wow fadeIn animated">
                                <strong>Address: </strong>48 Cao Thắng - Hải Châu - Đà Nẵng
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Phone: </strong>+84 966-948-914
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Email: </strong>levanthang230902@gmail.com
                            </p>
                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">About</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">My Account</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="{{route('shop.cart')}}">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="{{route('shop.checkout')}}">Order</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 mob-center">
                        <h5 class="widget-title wow fadeIn animated">Install App</h5>
                        <div class="row">
                            <div class="col-md-8 col-lg-12">
                                <p class="wow fadeIn animated">From App Store or Google Play</p>
                                <div class="download-app wow fadeIn animated mob-app">
                                    <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active"
                                            src="assets/imgs/theme/app-store.jpg" alt=""></a>
                                    <a href="#" class="hover-up"><img src="assets/imgs/theme/google-play.jpg"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                                <img class="wow fadeIn animated" src="assets/imgs/theme/payment-method.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated mob-center">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">
                        <a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-conditions.html">Terms &
                            Conditions</a>
                    </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">SurfsideMedia</strong> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Vendor JS-->
    <script src="{{ asset ('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{ asset ('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset ('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{ asset ('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/slick.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/wow.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/counterup.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/images-loaded.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/isotope.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{ asset ('assets/js/plugins/jquery.elevatezoom.js')}}"></script>
    <!-- Template  JS -->
    <script src="{{ asset ('assets/js/main.js?v=3.3')}}"></script>
    <script src="{{ asset ('assets/js/shop.js?v=3.3')}}"></script>
    
  
  <!-- Messenger Plugin chat Code -->
        <!-- Messenger Plugin chat Code -->
        @auth
        @if(Auth::user()->utype == 'USR')
            <div id="fb-root"></div>

        <!-- Your Plugin chat code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>
        @else
        @endif
        @endif

        <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "164229313445795");
        chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <!-- Your SDK code -->
        <script>
        window.fbAsyncInit = function() {
            FB.init({
            xfbml            : true,
            version          : 'v18.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        @livewireStyles
        @stack('scripts')
     
        
</body>

</html>