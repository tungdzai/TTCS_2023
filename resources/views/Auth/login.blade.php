<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{--    <link rel="stylesheet" href="./public/assets/css/login.css">--}}
    <title>Login</title>
<body>
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                     class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form action="{{route('auth.postLogin')}}" method="post">
                    @csrf
                    @if(session('msg'))
                        <div class="alert alert-success" >{{session('msg')}}</div>
                    @endif
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example13">Email address</label>
                        <input type="text" name="email" id="form1Example13" value="{{old("email")}}" class="form-control form-control-lg"/>
                        @error("email")
                        <span class="messages" style="color: #de0a0a">{{$message}}</span>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example23">Password</label>
                        <input type="password" name="password" id="form1Example23" value="{{old("password")}}" class="form-control form-control-lg"/>
                        @error("password")
                        <span class="messages" style="color: #de0a0a">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-around align-items-center mb-4">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked/>
                            <label class="form-check-label" for="form1Example3"> Remember me </label>
                        </div>
                        <a href="#!" style="text-decoration: none">Forgot password?</a>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block " style="width: 100%">Sign in</button>

                    <a href="{{route('auth.getRegister')}}" class="d-flex justify-content-center py-5" style="text-decoration: none" >Register</a>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>
</html>
<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
</style>
