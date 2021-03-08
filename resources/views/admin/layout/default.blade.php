<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản lý hàng hóa</title>
    <link rel="stylesheet" href="{{asset('theme/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('theme/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('theme/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('theme/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/js/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('theme/images/favicon.png')}}">
</head>
<body>
<div class="container-scroller">
    @include('admin.layout.header')
    <div class="container-fluid page-body-wrapper">
    @include('admin.layout.slider')
        <div class="main-panel">
            @yield('content')
            @include('admin.layout.footer')
        </div>
    </div>
</div>

<script src="{{asset('theme/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('theme/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('theme/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('theme/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('theme/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('theme/js/off-canvas.js')}}"></script>
<script src="{{asset('theme/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('theme/js/template.js')}}"></script>
<script src="{{asset('theme/js/settings.js')}}"></script>
<script src="{{asset('theme/js/todolist.js')}}"></script>
<script src="{{asset('theme/js/dashboard.js')}}"></script>
<script src="{{asset('theme/js/Chart.roundedBarCharts.js')}}"></script>
</body>

</html>

