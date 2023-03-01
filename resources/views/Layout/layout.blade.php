<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Custom fonts for this template-->
    <link href="../admin_lte/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../admin_lte/css/sb-admin-2.min.css" rel="stylesheet">
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
<script src="../admin_lte/vendor/jquery/jquery.min.js"></script>
<script src="../admin_lte/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../admin_lte/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../admin_lte/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../admin_lte/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../admin_lte/js/demo/chart-area-demo.js"></script>
<script src="../admin_lte/js/demo/chart-pie-demo.js"></script>

</body>

</html>
