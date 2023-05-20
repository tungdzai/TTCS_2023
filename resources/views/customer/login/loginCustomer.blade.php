@extends('customer.layout.layoutCustomer')
@section('title','Login')
@section('login')
    <div class="login">
        <div class="container justify-content-center">
            <div class="login-form">
                <form action="{{route('postLoginCustomer')}}" method="POST" id="login-form">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label>Phone</label>
                            <input class="form-control" id="phone" name="phone" type="text" placeholder="Phone">
                            <span id="phone-error" class="error"></span>
                        </div>
                        <div class="col-12 mb-2">
                            <label>Password</label>
                            <input class="form-control" id="password" name="password" type="text" placeholder="Password">
                            <span id="password-error" class="error"></span>
                        </div>
                        <div class="col-12 mb-2">
                            <a href="#">Quên mật khẩu ?</a>
                        </div>
                        <div class="col-12 mb-2 text-center">
                            <button id="login-btn" class="btn" type="submit">Sign in</button>
                        </div>
                        <div class="col-12 mt-5 text-center">
                            <a href="#">Sign up for account ?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
