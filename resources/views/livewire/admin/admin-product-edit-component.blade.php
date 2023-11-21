
<div>
    <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Trang chủ</a>
                        <span></span> Cập nhật sản phẩm 
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
                                        Cập nhật sản phẩm 
                                        </div>
                                        <div class="col-md-6">
                                        <a href="{{route('admin.products')}}" class="btn btn-success float-end">Tất cả sản phẩm</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                    @endif
                                    <form wire:submit.prevent="updateProduct">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Tên sách</label>
                                        <input type="text" name="name" class="form-control" placeholder="Nhập tên sách" wire:model="name" wire:keyup="generateSlug"/>
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Nhập slug" wire:model="slug"/>
                                        @error('slug')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror                                        
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">Tóm tắt</label>
                                        <textarea class="form-control" style="height: 150px;" name="description" placeholder="Nhập tóm tắt" wire:model="description"></textarea>
                                        @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3  col-md-2">
                                        <label for="regular_price" class="form-label">Giá bình thường</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="button" wire:click="decreaseRegularprice">-</button>
                                            </span>
                                            <input type="text" name="regular_price" class="form-control" placeholder="Nhập giá bình thường" wire:model="regular_price"/>
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="button" wire:click="increaseRegularprice">+</button>
                                            </span>
                                        </div>
                                        @error('regular_price')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>  
                                    <div class="mb-3 mt-3  col-md-2">
                                        <label for="sale_price" class="form-label">Giá giảm</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="button" wire:click="decreaseSaleprice">-</button>
                                            </span>
                                            <input type="text" name="sale_price" class="form-control" placeholder="Nhập giá giảm" wire:model="sale_price"/>
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="button" wire:click="increaseSaleprice">+</button>
                                            </span>
                                        </div>
                                        @error('sale_price')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>      
                                    <div class="mb-3 mt-3">
                                        <label for="ISBN" class="form-label">ISBN</label>
                                        <input type="text" name="ISBN" class="form-control" placeholder="Nhập ISBN" wire:model="ISBN"/>
                                        @error('sku')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror                                        
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="cover_type" class="form-label" wire:model="cover_type">Loại Bìa</label>
                                            <select class="form-control" name="cover_type" wire:model="cover_type">
                                                <option value="Bìa mềm">Bìa mềm</option>
                                                <option value="Bìa cứng">Bìa cứng</option>
                                            </select>
                                        @error('cover_type')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="size" class="form-label" >Kích thước</label>
                                        <input type="text" name="size" class="form-control" placeholder="Nhập kích thước 00x00cm" wire:model="size" />
                                        @error('size')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3  col-md-2">
                                        <label for="weight" class="form-label">Trọng lượng (gram)</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="button" wire:click="decreaseWeight">-</button>
                                            </span>
                                            <input type="text" name="weight" class="form-control" placeholder="Nhập trọng lượng" wire:model="weight"/>
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="button" wire:click="increaseWeight">+</button>
                                            </span>
                                        </div>
                                        @error('weight')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="language" class="form-label" wire:model="language">Ngôn ngữ</label>
                                            <select class="form-control" name="language" wire:model="language">
                                                <option value="Tiếng Việt">Tiếng Việt</option>
                                                <option value="Tiếng Nhật">Tiếng Nhật</option>
                                                <option value="Tiếng Trung">Tiếng Trung</option>
                                                <option value="Tiếng Hàn">Tiếng Hàn</option>
                                                <option value="Tiếng Anh">Tiếng Anh</option>
                                            </select>
                                        @error('language')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>   
                                    <div class="mb-3 mt-3">
                                        <label for="demographic" class="form-label" >Đối tượng</label>
                                            <select class="form-control" name="demographic" wire:model="demographic">
                                                <option value="3+">3+</option>
                                                <option value="13+">13+</option>
                                                <option value="17+">17+</option>
                                                <option value="18+">18+</option>
                                            </select>
                                        @error('demographic')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>  
                                    <div class="mb-3 mt-3">
                                        <label for="release_date" class="form-label">Ngày phát hành</label>
                                        <input type="text" name="release_date" class="form-control datepicker" placeholder="Chọn ngày phát hành" wire:model="release_date" autocomplete="off">
                                        @error('release_date')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                                                                                                                          
                                    <div class="mb-3 mt-3">
                                        <label for="stock_status" class="form-label"> Tình trạng hàng hoá</label>
                                            <select class="form-control" name="stock_status" wire:model="stock_status">
                                                <option value="Còn hàng">Còn hàng</option>
                                                <option value="Hết Hàng">Hết Hàng</option>
                                            </select>
                                        @error('stock_status')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="featured" class="form-label" >Featured</label>
                                            <select class="form-control" name="featured" wire:model="featured">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        @error('featured')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3  col-md-2">
                                        <label for="quantity" class="form-label">Số lượng sản phẩm</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="button" wire:click="decreaseQuantity">-</button>
                                            </span>
                                            <input type="text" name="quantity" class="form-control" placeholder="Nhập số lượng" wire:model="quantity"/>
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="button" wire:click="increaseQuantity">+</button>
                                            </span>
                                        </div>
                                        @error('quantity')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="newimage" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" wire:model="newimage"/>
                                        @if($newimage) 
                                            <img src="{{$newimage->temporaryUrl()}}" width="120" />
                                        @else
                                            <img src="{{asset('assets/imgs/products/products')}}/{{$image}}" width="120" />
                                        @endif

                                        @error('newimage')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="category_id" class="form-label" >Danh mục</label>
                                        <select class="form-control" name="category_id" wire:model="category_id">
                                        <option value="">Chọn danh mục</option>>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        </select>
                                        @error('category_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>     
                                    <div class="mb-3 mt-3">
                                        <label for="publisher_id" class="form-label" >Nhà phát hành</label>
                                        <select class="form-control" name="publisher_id" wire:model="publisher_id">
                                        <option value="">Chọn nhà phát hành</option>>
                                        @foreach($publishers as $publisher)
                                        <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                        @endforeach
                                        </select>
                                        @error('publisher_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>        
                                    <div class="mb-3 mt-3">
                                        <label for="author_id" class="form-label" >Tác giả</label>
                                        <select class="form-control" name="author_id" wire:model="author_id">
                                        <option value="">Chọn tác giả</option>>
                                        @foreach($authors as $author)
                                        <option value="{{$author->id}}">{{$author->name}}</option>
                                        @endforeach
                                        </select>
                                        @error('author_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
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
