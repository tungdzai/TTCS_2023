@extends('layout.layout')
@section("title")
    User - Thêm Category
@endsection
@section('sidebarTitle')
    @include('User.blocks.slidebar')
@endsection
@section('content')
    <div class="container-sm" style="margin: 0 auto;width: 50%">
        <!-- Page Heading -->
        @if(session("errors"))
            <div class="alert-danger alert">{{session("errors")}}</div>
        @endif
        <form action="{{route('user.handleAddCategory')}}" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                @error("name")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Parent ID</label>
                <select name="parent_id" class="form-control">
                    <option></option>
                    @foreach($categories as $category)
                        @if($category->parent_id == null)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach;
                </select>
                @error("parent_id")
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            @csrf
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="../../admin_lte/js/previewAvatar.js"></script>
@endsection
