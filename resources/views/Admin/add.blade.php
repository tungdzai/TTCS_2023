@extends('layout.layout')
@section("title")
    Admin - Thêm User
@endsection
@section('sidebarTitle')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>User</span></a>
    </li>
@endsection
@section('content')
    <div class="container-sm" style="margin: 0 auto;width: 50%" >
        <!-- Page Heading -->
        <form action="{{route('admin.postUser')}}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User</label>
                <input type="text" class="form-control" name="user" value="{{old('user')}}">
                @error("user")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}">
                @error("email")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}">
                @error("first_name")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}">
                @error("last_name")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Birthday</label>
                <input type="date" class="form-control" name="birthday" >
                @error("birthday")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="avatar">Tỉnh/Thành phố:</label>
                <select name="province" id="province" class="form-control">
                </select>
                @error("province")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="avatar">Quận/Huyện:</label>
                <select name="district" id="district" class="form-control">
                    <option value="">--Chọn huyện--</option>
                </select>
                @error("district")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="avatar">Phường/Xã:</label>
                <select name="commune" id="commune" class="form-control" >
                    <option value="">--Chọn xã--</option>
                </select>
                @error("commune")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="avatar">Address:</label>
                <textarea name="address" id="address"  rows="2"  class="form-control"></textarea>
                @error("address")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" class="form-control-file " id="avatar"  onchange="previewImage()">
                <img id="preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px; display: none;">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            @csrf
        </form>
    </div>
@endsection
