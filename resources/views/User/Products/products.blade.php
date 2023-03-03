@extends('layout.layout')
@section("title")
    User- Product
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
        <a href="{{route("user.addProduct")}}" class="btn btn-primary">Thêm sản phẩm</a>
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
                    <th scope="col">STT</th>
                    <th scope="col">Name</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Sku</th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Expired at</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $index =>$product)
                    <tr class=" text-center">
                        <td>{{$index+1}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->sku}}</td>
                        <td>{{$product->category_id}}</td>
                        <td>{{$product->expired_at}}</td>
                        <td>
                            <a href="#"><i class="fas fa-eye"></i></a>
                        </td>
                        <td>
                            <a href="{{route('user.getEditProduct',['id'=>$product->id])}}"><i
                                    class="fas fa-user-edit"></i></a>
                        </td>
                        <td>
                            <a href="#"><i
                                    class="fas fa-user-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{$products->links()}}
    </div>
@endsection
