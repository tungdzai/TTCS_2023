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
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                @error("name")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Stock</label>
                <input type="number" class="form-control" name="stock" value="{{old('stock')}}">
                @error("stock")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sku</label>
                <input type="text" class="form-control" name="sku" value="{{old('sku')}}" required minlength="10" maxlength="20" placeholder="a-z, A-Z, 0-9"  pattern="[a-zA-Z0-9]{10,20}">
                @error("sku")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category ID</label>
                <select name="category_id" class="form-control">
                    <option></option>
                </select>
                @error("category_id")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Expired at</label>
                <input type="date" class="form-control" name="expired_at" value="{{old('expired_at')}}">
                @error("expired_at")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <img id="imgshow" src="#" style="max-width: 200px; max-height: 200px; display: none;">
            </div>
            <div class="mb-3">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" class="form-control-file " id="avatar"  onchange="previewImage()">
                <img id="preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px; display: none;">
                @error("avatar")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            @csrf
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" ></script>
    <script src="../../admin_lte/js/previewAvatar.js"></script>
@endsection
