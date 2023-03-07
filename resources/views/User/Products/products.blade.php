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
@section('search')
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post"
          action="">{{--{{route('user.search')}}--}}
        <div class="input-group">
            @csrf
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                   aria-label="Search" aria-describedby="basic-addon2" name="search" value="{{session('titleSearch')}}" >
            <select name="stock" id="stock" class="bg-light border-0 small">
                <option value="">All</option>
                <option value="less_than_10">10</option>
                <option value="between_10_and_100">10 - 100</option>
                <option value="between_100_and_200">100 - 200</option>
                <option value="more_than_200">200</option>
            </select>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="option_product d-flex justify-content-between">
            <a href="{{route("user.addProduct")}}" class="btn btn-primary">Thêm sản phẩm</a>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    Download
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="">CSV</a></li>
{{--                    {{route('download.CSV')}}--}}
                    <li><a class="dropdown-item" href="">PDF</a></li>
{{--                    {{route('download.PDF')}}--}}
                </ul>
            </div>
        </div>
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
                        title: '{{session('successUpdate')}}}',
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
                        title: '{{session('successUpdate')}}}',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
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
                @if(empty(count($products)))
                    <tr class=" text-center">
                        <td colspan="9">Không có sản phẩm nào !</td>
                    </tr>
                @else
                    @foreach($products as $index =>$product)
                        <tr class=" text-center">
                            <td>{{$index+1}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{{$product->sku}}</td>
                            <td>{{$product->category_id}}</td>
                            <td>{{$product->expired_at}}</td>
                            <td>
                                <button class="preview" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        data-id="{{$product->id}}" style="border: none;background-color: #ffffff"><i
                                        class="fas fa-eye"></i></button>
                            </td>
                            <td>
                                <a href="{{route('user.getEditProduct',['id'=>$product->id])}}"><i
                                        class="fas fa-user-edit"></i></a>
                            </td>
                            <td>
                                <button class="deleteProduct" data-id="{{$product->id}}"
                                        style="border: none;background-color: #ffffff ;color: red"><i
                                        class="fas fa-user-times"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        {{--        {{$products->links()}}--}}
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
                                <input type="date" class="form-control" name="expired_at" id="expired_at">
                            </div>
                            <div class="mb-3">
                                <img id="image_preview" src="" style="max-width: 200px; max-height: 200px">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
