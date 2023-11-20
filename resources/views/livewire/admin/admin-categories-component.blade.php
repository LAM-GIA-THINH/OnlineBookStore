<div>
    <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Trang chủ</a>
                        <span></span> Tất cả Danh mục
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
                                        <h4 class="mb-0">Tất cả Danh mục</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input wire:model="search" type="text" class="form-control" placeholder="Tìm kiếm bằng tên...">
                                            <button wire:click="clearSearch" class="btn btn-secondary btn-sm">Xoá</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end">
                                        <a href="{{ route('admin.category.add') }}" class="btn btn-success btn-sx">Thêm danh mục</a>
                                    </div>
                                </div>
                            </div>
                                <div class="card-body">
                                        <table class="table table-striped">
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



