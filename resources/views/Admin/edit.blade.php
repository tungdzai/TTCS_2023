@extends('layout.layout')
@section("title")
    Admin - Update User
@endsection
@section('sidebarTitle')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Users</span></a>
    </li>
@endsection
@section('content')
    <div class="container-sm" style="margin: 0 auto;width: 50%">
        <!-- Page Heading -->
        <form action="{{route("admin.postEdit")}}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User</label>
                <input type="text" class="form-control" name="user"
                       value="{{!empty($getUser->user_name)?$getUser->user_name:old('user')}}">
                @error("user")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email"
                       value="{{!empty($getUser->user_name)?$getUser->email:old('email')}}">
                @error("email")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name"
                       value="{{!empty($getUser->user_name)?$getUser->first_name:old('first_name')}}">
                @error("first_name")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name"
                       value="{{!empty($getUser->user_name)?$getUser->last_name:old('last_name')}}">
                @error("last_name")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Birthday</label>
                <input type="date" class="form-control" name="birthday"
                       value="{{!empty($getUser->user_name)?$getUser->birthday:old('birthday')}}">
                @error("birthday")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <img src="{{$getUser->avatar}}" alt="">
            </div>
            <div class="mb-3">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" class="form-control-file " id="avatar" onchange="previewImage()">
                <img id="preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px; display: none;">
                @error("avatar")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">UPDATE</button>
            @csrf
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="../../admin_lte/js/previewAvatar.js"></script>
@endsection
