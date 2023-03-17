<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="{{asset('admin_lte/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet"
          type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{asset('admin_lte/css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('language/css/style.css')}}">
    <title>@yield("title")</title>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @section("sidebar")
        @include('blocks.sidebar')
    @show
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Header -->
            @include('blocks.header')
            <!-- End of Header -->

            <!-- Content -->
            @yield('content')
            <!-- End of Content -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('blocks.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
@include('blocks.scroll')

<!-- Logout Modal-->
@include('blocks.modal')

<!-- Bootstrap core JavaScript-->
<script src="{{asset('admin_lte/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin_lte/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('admin_lte/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('admin_lte/js/sb-admin-2.min.js')}}"></script>
<!-- Page level plugins -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="{{asset('assets/js/delete.js')}}"></script>
<script src="{{asset('assets/js/previewProduct.js')}}"></script>
<script src="{{asset('admin_lte/js/previewAvatar.js')}}"></script>
<script src="{{asset('assets/js/province_district_commune.js')}}"></script>
<script src="{{asset('language/js/js.js')}}"></script>
</body>
</html>
