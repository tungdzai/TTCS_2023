@extends('layout.layout')
@section("title")
    User- Detail
@endsection
@section('search')
    <div class="titleDetail">Chi tiết đơn hàng # {{$details[0]->order_detail_id}} </div>
@endsection
@section('sidebarTitle')
    @include('user.blocks.slidebar')
@endsection
@section('content')
    <div class="container-fluid">
        <h6>THÔNG TIN NGƯỜI NHẬN</h6>
        <div class="infoWrap">
            <p class="full_name" style="font-weight:500">{{$customer->full_name_customer}}</p>
            <div class="address">
                Địa chỉ : {{$customer->address_customer}},{{$customer->commune_name}},{{$customer->district_name}}
                ,{{$customer->province_name}}.
            </div>
            <span class="phone">Điện thoại: {{$customer->phone_customer}}</span>
            <br>
            <span class="phone">Email: {{$customer->email_customer}}</span>
        </div>
        <table class="table">
            <thead>
            <tr class="text-left">
                <th scope="col" class="col-1">Sản phẩm</th>
                <th scope="col" class="col-5"></th>
                <th scope="col" class="col-2">Giá</th>
                <th scope="col" class="col-1">Số lượng</th>
                <th scope="col" class="col-2 text-right">Tạm tính</th>
            </tr>
            </thead>
            <tbody>
            @foreach($details as $detail)
                <tr>
                    <td>
                        <img src="{{$detail->product_avatar}}" alt="" width="100%">
                    </td>
                    <td>{{$detail->product_name}}</td>
                    <td>{{number_format($detail->order_details_price, 0, ',', '.').' VND'}}</td>
                    <td class="text-center">{{$detail->order_details_quantity}}</td>
                    <td class="text-right">{{number_format($detail->order_details_price * $detail->order_details_quantity , 0, ',', '.').' VND'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="totalWrap d-flex justify-content-end">

            <h5>Tổng cộng :</h5>
            <span style="color: #c22121">
            @php
                $total=0;
                foreach ($details as $detail){
                    $total+=$detail->order_details_price*$detail->order_details_quantity;
                }
                echo number_format($total, 0, ',', '.').' VND';
            @endphp
            </span>
        </div>
        <a href="{{route("user.billPDF")}}" class="btn btn-success">In hóa đơn</a>
    </div>
@endsection
