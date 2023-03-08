@extends('layout.layout')
@section("title")
    User- Category
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
    <div class="container-fluid">
        <!-- Page Heading -->
        <a href="{{route('user.addCategory')}}" class="btn btn-primary">Thêm danh mục</a>
        <div class="d;-sm-flex align-items-center justify-content-between mb-4 py-2">
            @if(session('successAdd'))
                <script>
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: '{{ session('successAdd') }}',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @endif
            @if(session('successUpdate'))
                <script>
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: '{{ session('successUpdate') }}',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @endif
            @if(session('successDelete'))
                <script>
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: '{{ session('successDelete') }}',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @endif
            <table class="table">
                <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">parent_id</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $index =>$category)
                    <tr class=" text-center">
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->parent_id}}</td>
                        <td>
                            <a href="{{route('user.getEditCategory',['id'=>$category->id])}}"><i
                                    class="fas fa-user-edit"></i></a>
                        </td>
                        <td>
                            <a href="{{route('user.deleteCategory',['id'=>$category->id])}}"><i
                                    class="fas fa-user-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{$categories->links()}}
    </div>
@endsection
