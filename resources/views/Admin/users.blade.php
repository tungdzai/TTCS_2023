@extends('layout.layout')
@section("title")
    Admin - Quản lý user
@endsection
@section('sidebarTitle')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Users</span></a>
    </li>
@endsection
@section('search')
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post"
          action="{{route('admin.search')}}">
        <div class="input-group">
            @csrf
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                   aria-label="Search" aria-describedby="basic-addon2" name="search" value="{{session('titleSearch')}}">
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
        <a href="{{route('admin.addUser')}}" class="btn btn-primary">Thêm User</a>

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
        @if(session('errorAdd'))
            <script>
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: '{{ session('errorAdd') }}',
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
        <div class="d;-sm-flex align-items-center justify-content-between mb-4 py-2">
            <table class="table">
                <thead>
                <tr class="text-center">
                    <th scope="col">STT</th>
                    <th scope="col">User</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Email</th>
                    <th scope="col">Flag Delete</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @if(empty(count($users)))
                    <tr class=" text-center">
                        <td colspan="9">Không có user nào !</td>
                    </tr>
                @else
                    @foreach($users as $index => $user)
                        <tr class="text-left ">
                            <td>{{$index+1}}</td>
                            <td>{{$user->user_name}}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->birthday}}</td>
                            <td>{{$user->email}}</td>
                            <td class="text-center">{{$user->flag_delete}}</td>
                            <td>
                                <a href="{{route('admin.getEdit',['id'=>$user->id])}}"><i class="fas fa-user-edit"></i></a>
                            </td>
                            <td>
                                <a href="{{route('admin.deleteUser',['id'=>$user->id])}}"><i
                                        class="fas fa-user-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
{{--        {{$users->links()}}--}}
    </div>
@endsection
