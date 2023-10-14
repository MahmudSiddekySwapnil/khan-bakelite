<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Jidox - Material Design Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- App favicon -->
    <link rel="shortcut icon" href="admin_assets/images/favicon.ico">

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="admin_assets/vendor/daterangepicker/daterangepicker.css">

    <!-- Vector Map css -->
    <link rel="stylesheet" href="admin_assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">

    <!-- Theme Config Js -->
    <script src="admin_assets/js/config.js"></script>

    <!-- App css -->
    <link href="admin_assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="admin_assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body>





@include('admin_view.common.topbar')
@include('admin_view.common.sidebar')
@yield('container')
@include('admin_view.common.footer')







<!-- Vendor js -->
<script src="admin_assets/js/vendor.min.js"></script>

<!-- Daterangepicker js -->
<script src="admin_assets/vendor/daterangepicker/moment.min.js"></script>
<script src="admin_assets/vendor/daterangepicker/daterangepicker.js"></script>

<!-- Apex Charts js -->
<script src="admin_assets/vendor/apexcharts/apexcharts.min.js"></script>

<!-- Vector Map js -->
<script src="admin_assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="admin_assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

<!-- Dashboard App js -->
<script src="admin_assets/js/pages/demo.dashboard.js"></script>

<!-- App js -->
<script src="admin_assets/js/app.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>
</html>
