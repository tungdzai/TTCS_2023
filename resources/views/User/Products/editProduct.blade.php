@extends('layout.layout')
@section("title")
    User - Thêm Product
@endsection
@section('sidebarTitle')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('user.category')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Category</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('user.product')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Product</span></a>
    </li>
@endsection
@section('content')
    <div class="container-sm" style="margin: 0 auto;width: 50%" >
        <!-- Page Heading -->
        <form action="{{route('user.handleEditProduct')}}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{!empty($getProduct->name)?$getProduct->name:old('name')}}"  id="productName">
                @error("name")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Stock</label>
                <input type="number" class="form-control" name="stock" value="{{!empty($getProduct->stock)?$getProduct->stock:old('stock')}}"  id="productStock">
                @error("stock")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sku</label>
                <input type="text" class="form-control" name="sku" value="{{!empty($getProduct->sku)?$getProduct->sku:old('sku')}}"  required minlength="10" maxlength="20" placeholder="a-z, A-Z, 0-9"  pattern="[a-zA-Z0-9]{10,20}" id="productSku">
                @error("sku")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category ID</label>
                <select name="category_id" class="form-control"  id="productCategoryID" >
                    @foreach($categories as $category)
                        @if($category->id == $getProduct->category_id)
                            <option>{{$category->name}}</option>
                        @endif
                    @endforeach
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error("category_id")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Expired at</label>
                <input type="date" class="form-control" name="expired_at" value="{{!empty($getProduct->expired_at)?$getProduct->expired_at:old('expired_at')}}" id="productExpired">
                @error("expired_at")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <img id="preview" src="{{!empty($getProduct->avatar)?$getProduct->avatar:'#'}}" style="max-width: 200px; max-height: 200px">
            </div>
            <div class="mb-3">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" class="form-control-file " id="avatar"  onchange="previewImage()">
                <img id="preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px; display: none;">
                @error("avatar")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class=" d-flex justify-content-end" style="cursor: pointer" id="previewProduct" data-bs-toggle="modal"
                 data-bs-target="#exampleModal"><i class="far fa-eye"></i></div>
            <button type="submit" class="btn btn-primary">Submit</button>
            @csrf
        </form>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="get">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="namePreview">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Stock</label>
                                <input type="number" class="form-control" name="stock" id="stockPreview">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Sku</label>
                                <input type="text" class="form-control" name="sku" id="skuPreview">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Category ID</label>
                                <select name="category_id" class="form-control">
                                    <option id="category_id_preview"></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Expired at</label>
                                <input type="date" class="form-control" name="expired_at" id="expired_at_preview">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
