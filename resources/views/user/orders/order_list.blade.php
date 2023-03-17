@extends('layout.layout')
@section("title")
    User- Order List
@endsection
@section('sidebarTitle')
    @include('user.blocks.slidebar')
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <table class="table">
            <thead>
            <tr class="text-center">
                <th scope="col">STT</th>
                <th scope="col">Customer ID</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Chi tiết</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $index => $order)
                <tr class=" text-center">
                    <td>{{$index+1}}</td>
                    <td>{{$order->customer_id}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{number_format($order->total, 0, ',', '.').' VND'}}</td>
                    <td>
                        <a href="{{route('user.getDetail',['id'=>$order->id])}}"><i class="fas fa-info-circle"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
