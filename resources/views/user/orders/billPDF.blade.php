<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hóa đơn</title>
    <style>
        /* CSS cho bảng */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .information {
            display: flex;
            border-top: 1px solid;
            padding: 10px 0;

        }

        .sender {
            width: 50%;
        }

        .Receiver {
            width: 50%;
        }

        .order_content {
            border-top: 1px solid;
            padding: 10px 0;
        }
    </style>
</head>
<body>
<div class="information">
    <div class="sender">
        <span>Form</span>
    </div>
    <div class="Receiver">
        <div class="infoWrap">
            <span>To</span>
            <p class="full_name" style="font-weight:500">{{$customer->full_name_customer}}</p>
            <div class="address">
                Dia chi : {{$customer->address_customer}},{{$customer->commune_name}},{{$customer->district_name}}
                ,{{$customer->province_name}}.
            </div>
            <span class="phone">Dienthoai: {{$customer->phone_customer}}</span>
            <br>
            <span class="phone">Email: {{$customer->email_customer}}</span>
        </div>
    </div>
</div>
<div class="order_content">
    <span>Noi dung don hang :</span>
</div>
<table>
    <thead>
    <tr>
        <th>STT</th>
        <th>San pham </th>
        <th>So luong</th>
        <th>Gia</th>
    </tr>
    </thead>
    <tbody>
    @foreach($details as $index => $detail)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$detail->product_name}}</td>
            <td>{{$detail->order_details_quantity}}</td>
            <td>{{$detail->order_details_price}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="totalWrap">

    <h5>Thanh tien :</h5>
    <span style="color: #c22121">
            @php
                $total=0;
                foreach ($details as $detail){
                    $total+=$detail->order_details_price*$detail->order_details_quantity;
                }
                echo number_format($total, 0, ',', '.').'VND';
            @endphp
    </span>
</div>
</body>
</html>
