<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{asset('store/store/lib/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('store/store/lib/slick/slick-theme.css')}}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{asset('store/store/css/style.css')}}" rel="stylesheet">
</head>

<body>
<!-- Top bar Start -->
@include('customer.layout.blocks.header')
<!-- Top bar End -->


<!-- Login Start -->
@yield('login')
<!-- Login End -->
@include('customer.layout.blocks.footer')
<!-- Footer Start -->


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/store/store/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('/store/store/lib/slick/slick.min.js')}}"></script>
<script src="{{asset('/store/store/js/main.js')}}"></script>
</body>
</html>
