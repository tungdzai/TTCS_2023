<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('customer/css/customer.scss')}}">
    <title>Customer</title>
</head>
<body>
<div class="materialContainer">
    <form action="{{route('postLoginCustomer')}}" method="post">
        @csrf
        <div class="box">
            <div class="title">LOGIN</div>
            <div class="input">
                <label for="name">Phone</label>
                <input type="text" name="phone" id="name">
            </div>
            <div class="input">
                <label for="pass">Password</label>
                <input type="password" name="password" id="pass">
                <span class="spin"></span>
            </div>
            <div class="button login">
                <button><span>GO</span> <i class="fa fa-check"></i></button>
            </div>
            <a href="" class="pass-forgot">Forgot your password?</a>
        </div>
    </form>

    <div class="overbox">
        <div class="material-button alt-2"><span class="shape"></span></div>
        <div class="title">REGISTER</div>
        <div class="input">
            <label for="regname">Username</label>
            <input type="text" name="regname" id="regname">
            <span class="spin"></span>
        </div>
        <div class="input">
            <label for="regpass">Password</label>
            <input type="password" name="regpass" id="regpass">
            <span class="spin"></span>
        </div>
        <div class="input">
            <label for="reregpass">Repeat Password</label>
            <input type="password" name="reregpass" id="reregpass">
            <span class="spin"></span>
        </div>
        <div class="button">
            <button><span>NEXT</span></button>
        </div>
    </div>

</div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="../../customer/js/customer.js"></script>
