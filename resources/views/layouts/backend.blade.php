<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}">
    <!-- Fontawsome -->
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/fontawesome/all.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('assets/backend/css/main.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('assets/backend/css/responsive.css')}}">
    <!--data table-->
    <link rel="stylesheet" href="{{asset('assets/backend/vendor/css/data-table/dataTables.bootstrap4.min.css')}}">
</head>

<body>
    <!-- sideBar wrapper -->
    @include('backend.partials.sidebar')

    <!-- content wrapper-->
    <div class="content-wrapper sideBars_open">
        <!-- top head start -->
        <header>
            <!-- nav wrapper -->
            @include('backend.partials.header')
        </header>

        <!-- Main content start -->
        <div class="main_content">
            <!-- content area -->
            @yield('content')
        </div>
    </div>

    <!-- footer section -->
    <div class="footer_section">
        Copyright @2025 all made by Ashik
    </div>


    <!--Start javascript -->
    <!-- jQuery.min.js -->
    <script type="text/javascript" src="{{asset('assets/backend/js/jquery.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script type="text/javascript" src="{{asset('assets/backend/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/js/bootstrap.min.js')}}"></script>
    <!-- Optional js  -->
    <script type="text/javascript" src="{{asset('assets/backend/js/main.js')}}"></script>
        <!-- data table -->
        <script type="text/javascript" src="{{asset('assets/backend/vendor/js/data-table/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/backend/vendor/js/data-table/dataTables.bootstrap4.min.js')}}"></script>
</body>

</html>
