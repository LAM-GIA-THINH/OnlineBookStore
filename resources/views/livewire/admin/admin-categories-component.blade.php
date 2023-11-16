<div>
    <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Home</a>
                        <span></span> All Categories
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
                                            All Categories
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{route('admin.category.add')}}" class="btn btn-success float-end">Add New Category</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categories as $category)
                                                    <tr>
                                                        <td>{{$category->id}}</td>
                                                        <td>{{$category->name}}</td>
                                                        <td>{{$category->slug}}</td>
                                                        <td>
                                                            <a href="{{route('admin.category.edit', ['category_id'=>$category->id])}}" class="text-info">Edit</a>
                                                            <a href="{{route('admin.category.delete', ['category_id'=>$category->id])}}" class="text-danger" style="margin-left:20px;">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                        {{$categories->links('pagination::bootstrap-4')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>
</div>



