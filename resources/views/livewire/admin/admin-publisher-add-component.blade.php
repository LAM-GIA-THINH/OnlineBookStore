<div>
    <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Trang chủ</a>
                        <span></span> Thêm nhà phát hành
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
                                        Thêm nhà phát hành
                                        </div>
                                        <div class="col-md-6">
                                        <a href="{{route('admin.publishers')}}" class="btn btn-success float-end">Tất cả nhà phát hành</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                    @endif
                                <form wire:submit.prevent="storePublisher">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Tên nhà phát hành</label>
                                        <input type="text" name="name" class="form-control" placeholder="Nhập tên" wire:model="name" wire:keyup="generateSlug"/>
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
                                        <button type="submit" class="btn btn-primary float-end">Thêm</button>
                                </form>
                                </div>
                                @livewireScripts
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>
