@extends('layout.layout')
@section("title")
    Admin - Thêm User
@endsection
@section('content')
    <div class="container-sm" style="margin: 0 auto;width: 50%" >
        <!-- Page Heading -->
        <form action="{{route('admin.postUser')}}" method="post">
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
                <input type="text" class="form-control" name="first_name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Birthday</label>
                <input type="date" class="form-control" name="birthday">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            @csrf
        </form>
    </div>
@endsection
