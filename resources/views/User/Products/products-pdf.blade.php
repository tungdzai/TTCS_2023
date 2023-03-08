<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách sản phẩm</title>
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
    </style>
</head>
<body>
// View form PDF
<h1>Danh sách sản phẩm</h1>
<p>Ngày tháng năm: {{date('d-m-Y')}}</p>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Stock</th>
        <th>Danh mục</th>
        <th>Hạn sản phẩm</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name}}</td>
            <td>{{ $product->stock}}</td>
            <td>{{ $product->category_name }}</td>
            <td>{{ $product->expired_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
