
<div>
@livewireStyles
    

<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Trảng chủ</a>
                    <span></span> Chi tiết sản phẩm
                    <span></span>{{$product->name}}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src=" {{asset('assets/imgs/products/products')}}/{{$product->image}}" alt="product image">
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="{{asset('assets/imgs/products/products')}}/{{$product->image}}" alt="product image">
                                            </figure>
                                           
                                        </div>
                                        <!-- THUMBNAILS -->
                                      
                                    </div>
                                    <!-- End Gallery -->
                                    <div class="social-icons single-share">
                                        <ul class="text-grey-5 d-inline-block">
                                            <li><strong class="mr-10">Chia sẽ:</strong></li>
                                            <li class="social-facebook"><a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a></li>
                                            <li class="social-twitter"> <a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a></li>
                                            <li class="social-instagram"><a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a></li>
                                            <li class="social-linkedin"><a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{$product->name}}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                               <span>Nhà sản xuất: {{$publisher->name}}</span>
                                            </div>
                                            <div>

                                            </div>
                                           
                                        </div>
                                        <div class="clearfix product-price-cover ">
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">{{number_format($product->regular_price)}} VND</span></ins>
                                                <ins><span class="old-price font-md ml-15">{{number_format($product->sale_price)}}</span></ins>
                                                <span class="save-price  font-md color3 ml-15">25% Off</span>
                                            </div>
                                        </div>
                                        <div class="product-extra-link2 mt-15  mb-15">
                                            @livewireStyles
                                            @if($product->quantity > 0)
                                                <button type="button" class="button button-add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Thêm vào giỏ hàng</button>
                                            @else    
                                                <button type="button" class="button button-add-to-cart " onclick="addToCart('{{$product->name}}')" >Hết Hàng</button>
                                            @endif
                                           
                                                @php 
                                                    $witems = Cart::instance('wishlist')->content()->pluck('id');
                                                @endphp
                                                
                                                @if($witems->contains($product->id))
                                                <a aria-label="Bỏ yêu thích" class="action-btn hover-up wishlisted" href="#" wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="fi-rs-heart" ></i></a>
                                                 @else
                                                 <a aria-label="Yêu thích" class="action-btn hover-up"   wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fi-rs-heart" ></i></a>
                                                @endif
                                                @livewireScripts 
                                            </div>
                                           
                                        </div>
                                        <div class=" mb-20">
                                            <ul class="product-meta  ">
                                                <li class="mb-5">ISBN: <a href="#">{{$product->ISBN}}</a></li>
                                                @if($product->quantity > 0)
                                                    <li>Số lượng:<span class="in-stock text-success ml-5">{{$product->quantity}} Sản phẩm</span></li>
                                                @else 
                                                    <li>Số lượng:<span class="in-stock text-success ml-5">Hết hàng</span></li>
                                                @endif   
                                            </ul>
                                        </div>
                                        <div class="short-desc mb-20">
                                            <div class="tab-style3">
                                            <ul class="nav nav-tabs text-uppercase">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Mô Tả</a>
                                                </li>
                                            
                                            </ul>
                                            <div class="tab-content shop_info_tab entry-main-content">
                                                <div class="tab-pane fade show active" id="Description">
                                                    <div class="">
                                                        {{$product->description}}
                                                    
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        </div>
        
                                        
                                    <!-- Detail Info -->
                                </div>
                            </div>
                          
                            <div style="background-color: #9af5b3; padding :20px; margin-top: 20px" >
                                <div style="display: inline-block; width: 33%; padding-left:80px  ;">
                                    <div style=" padding: 5px; "><strong>Định dạng : </strong><span> {{$product->cover_type}}</span></div>
                                    <div style=" padding: 5px; "><strong>Kích Thước : </strong><span> {{$product->size}}</span></div>
                                    <div style=" padding: 5px; "><strong>Trọng Lượng : </strong><span> {{$product->weight}}g</span></div>
                                </div>
                                <div style="display: inline-block; width: 33%; padding-left:80px ;">
                                    <div style=" padding: 5px; "><strong>Số Trang : </strong><span> {{$product->pages}}</span></div>
                                    <div style=" padding: 5px; "><strong>Trạng thái : </strong><span> {{$product->stock_status}}</span></div>
                                    <div style=" padding: 5px; "><strong>Ngày Phát Hành : </strong><span> {{$product->release_date}}</span></div>
                                </div>
                                <div style="display: inline-block; width: 33%;padding-left:80px ">
                                    <div style=" padding: 5px; "><strong>ISBN : </strong><span> {{$product->ISBN}}</span></div>
                                    <div style=" padding: 5px; "><strong>Ngôn ngữ : </strong><span> {{$product->language}}</span></div>
                                    <div style=" padding: 5px; "><strong>Đối tượng : </strong><span> {{$product->demographic}}</span></div>
                                </div>
                            </div>
                            
                            
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h3 class="section-title style-1 mb-30">Sản Phẩm Liên Quan</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @foreach($rproducts as $rproduct)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap small hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{route('product.details',['slug'=>$rproduct->slug])}}" tabindex="0">
                                                            <img class="default-img" src="{{asset('assets/imgs/products/products')}}/{{$rproduct->image}}" alt="{{$rproduct->name}}">
                                                            <img class="hover-img" src="{{asset('assets/imgs/products/products')}}/{{$rproduct->image}}" alt="{{$rproduct->name}}">
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Hot</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="{{route('product.details',['slug'=>$rproduct->slug])}}" tabindex="0">{{substr($rproduct->name,0,60)}}</a></h2>
                                                    
                                                    <div class="product-price">
                                                        <span>{{number_format($product->regular_price)}} VND</span>
                                                        <!-- <span class="old-price">$245.8</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                      
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <!-- <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                <li><a href="shop.html">Shoes & Bags</a></li>
                                <li><a href="shop.html">Blouses & Shirts</a></li>
                                <li><a href="shop.html">Dresses</a></li>
                                <li><a href="shop.html">Swimwear</a></li>
                                <li><a href="shop.html">Beauty</a></li>
                                <li><a href="shop.html">Jewelry & Watch</a></li>
                                <li><a href="shop.html">Accessories</a></li>
                            </ul>
                        </div> -->
                        <!-- Fillter By Price -->
                       
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Sản Phẩm Mới</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            @foreach($nproducts as $nproduct)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{asset('assets/imgs/products/products')}}/{{$nproduct->image}}" alt="{{$nproduct->name}}">
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="{{route('product.details',['slug'=>$nproduct->slug])}}">{{substr($nproduct->name,0,50)}}...</a></h5>
                                    <p class="price mb-0 mt-5">{{number_format($product->regular_price)}} VND</p>
                                    
                                </div>
                            </div>
                            @endforeach
                           
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
    </main>
    @livewireScripts
</div>
@push('scripts')
    <script>

        function addToCart(name) {
            alert("sản phẩm "+ name +" đã hết hàng");
        }
        var sliderrange = $('#slider-range');
        var amountprice = $('#amount');
        $(function() {
            sliderrange.slider({
                range: true,
                min: 10000,
                max: 900000,
                values: [10000, 900000],
                slide: function(event, ui) {
                    
                    @this.set('min_value',ui.values[0]);
                    @this.set('max_value',ui.values[1]);
                }
            });
        }); 
    </script>
    
@endpush