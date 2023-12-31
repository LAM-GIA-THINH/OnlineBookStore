<div>
    <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Trang chủ</a>
                        <span></span> Quản lý Danh mục
                    </div>
                </div>
            </div>
            <div style="background-color: #07b55b; color: #fff; padding: 20px 0; text-align: center;">
                <div class="container">
                    <h2 style="margin: 0; font-size: 24px; font-weight: bold; color:white;">Quản lý danh mục</h2>
                </div>
            </div>
            <section class="mt-50 mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            <div class="card-header" style=" border: 2px solid #ccc; border-radius: 4px;"> 
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input wire:model="search" type="text" class="form-control" placeholder="Tìm kiếm bằng tên..." style="border: 1px solid #ccc; border-radius: 4px;">
                                            <button wire:click="clearSearch" class="btn btn-secondary btn-sm">Xoá</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end">
                                        <a href="{{ route('admin.category.add') }}" class="btn btn-success btn-sx">Thêm danh mục</a>
                                    </div>
                                </div>
                            </div>
                                <div class="card-body">
                                        <table class="table table-striped" style="border: 2px solid #ccc;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên</th>
                                                    <th>Slug</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categories as $category)
                                                    <tr>
                                                        <td>{{$category->id}}</td>
                                                        <td>{{$category->name}}</td>
                                                        <td>{{$category->slug}}</td>
                                                        <td>
                                                            <a href="{{route('admin.category.edit', ['category_id'=>$category->id])}}" class="text-info">Chỉnh sửa</a>
                                                            <a href="{{route('admin.category.delete', ['category_id'=>$category->id])}}" class="text-danger" style="margin-left:20px;">Xoá</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                        {{$categories->links('pagination::bootstrap-4')}}
                                </div>
                                @livewireScripts
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>
</div>



