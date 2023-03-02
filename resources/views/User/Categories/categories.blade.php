@extends('layout.layout')
@section("title")
    User- Category
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <a href="{{route('user.addCategory')}}" class="btn btn-primary">Thêm danh mục</a>
        <div class="d;-sm-flex align-items-center justify-content-between mb-4 py-2">
            @if(session('successAdd'))
                <div class="alert alert-success">{{session('successAdd')}}</div>
            @elseif(session('successUpdate'))
                <div class="alert alert-success">{{session('successUpdate')}}</div>
            @elseif(session('successDelete'))
                <div class="alert alert-success">{{session('successDelete')}}</div>
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
                            <a href="{{route('user.getEditCategory',['id'=>$category->id])}}"><i class="fas fa-user-edit"></i></a>
                        </td>
                        <td>
                            <a href="{{route('user.deleteCategory',['id'=>$category->id])}}"><i class="fas fa-user-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{$categories->links()}}
    </div>
@endsection
