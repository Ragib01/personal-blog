<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="{{ url('admin/img/favicon.png') }}">

    <title>@yield('title')</title>

    <link href="{{ url('admin/swt/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ url('admin/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('admin/css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Premium Icons -->
    <link href="{{ url('admin/css/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ url('admin/css/glyphicons-filetypes.css') }}" rel="stylesheet">
    <link href="{{ url('admin/css/glyphicons-social.css') }}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ url('admin/css/style.css') }}" rel="stylesheet">

    @yield('style')

</head>

<body class="app header-fixed aside-menu-fixed aside-menu-hidden">

@include('inc.header')

<div class="app-body">

    @include('inc.sidebar')

    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        @yield('breadcrumb')


        <div class="container-fluid">

            @yield('content')

        </div>
        <!-- /.conainer-fluid -->
    </main>

</div>

<footer class="app-footer">
    <a href="https://proximio.net">Website</a> © 2017 Blog.
    <span class="float-right">
        Powered by <a href="https://proximio.net">Proximio</a>
    </span>
</footer>

<!-- Bootstrap and necessary plugins -->
<script src="{{ url('admin/js/libs/jquery.min.js') }}"></script>
<script src="{{ url('admin/js/libs/tether.min.js') }}"></script>
<script src="{{ url('admin/js/libs/bootstrap.min.js') }}"></script>
<script src="{{ url('admin/js/libs/pace.min.js') }}"></script>

<!-- Plugins and scripts required by all views -->
<script src="{{ url('admin/js/libs/Chart.min.js') }}"></script>

<!-- GenesisUI main scripts -->
<script src="{{ url('admin/js/app.js') }}"></script>

<!-- Plugins and scripts required by this views -->
<script src="{{ url('admin/js/libs/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('admin/js/libs/dataTables.bootstrap4.min.js') }}"></script>

<!-- Custom scripts required by this view -->
<script src="{{ url('admin/js/views/tables.js') }}"></script>
<script src="{{ url('admin/swt/sweetalert2.min.js') }}"></script>

<script src="//cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>

@yield('script')

</body>

</html>