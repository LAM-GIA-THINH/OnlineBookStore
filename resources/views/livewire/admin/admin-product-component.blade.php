<div>
    <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Home</a>
                        <span></span> Tất cả sản phẩm
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
                                        <h4 class="mb-0">Tất cả sản phẩm</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input wire:model="search" type="text" class="form-control" placeholder="Search by name...">
                                            <button wire:click="clearSearch" class="btn btn-secondary btn-sm">Clear</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end">
                                        <a href="{{ route('admin.product.add') }}" class="btn btn-success btn-sx">Thêm sản phẩm</a>
                                    </div>
                                </div>
                            </div>
                                <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Stock</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($products as $product)
                                                    <tr>
                                                    <td>{{$product->id}}</td>
                                                    <td><img src="{{ asset('assets/imgs/products/products')}}/{{$product->image}}" alt="{{$product->name}}" width="60" /></td>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->stock_status}}</td>
                                                    <td>{{$product->regular_price}}</td>
                                                    <td>{{$product->category->name}}</td>
                                                    <td>{{$product->created_at}}</td>
                                                    <td>
                                                        <a href="{{route('admin.product.edit', ['product_id'=>$product->id])}}" class="text-info">Edit</a>
                                                        <a href="{{route('admin.product.delete', ['product_id'=>$product->id])}}" class="text-danger" style="margin-left:20px;">Delete</a>   
                                                    </td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                        {{$products->links('pagination::bootstrap-4')}}
                                </div>
                                @livewireScripts
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>
</div>



