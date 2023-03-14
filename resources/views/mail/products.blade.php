<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>
@php
use Carbon\Carbon;
@endphp
<h3>Danh sách sản phẩm :{{Carbon::now()->format('H:i:s d/m/Y')}}</h3>
<table class="table">
    <tr class="text-center">
        <th scope="col">STT</th>
        <th scope="col">Tên sản phẩm </th>
        <th scope="col">Mã sản phẩm </th>
        <th scope="col">Số lượng</th>
        <th scope="col">Ngày hết hạn</th>
    </tr>
    <tbody>
    @foreach($products as $index => $product)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->sku}}</td>
            <td>{{$product->stock}}</td>
            <td>{{$product->expired_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
