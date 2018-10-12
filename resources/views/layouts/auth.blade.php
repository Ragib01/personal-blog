<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

    <title>@yield('title')</title>

    <!-- Icons -->
    <link href="{{ url('admin/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('admin/css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ url('admin/css/style.css') }}" rel="stylesheet">

    <style>
        button, a {
            cursor: pointer !important;
        }
    </style>

</head>

<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        @yield('content')
    </div>
</div>

<!-- Bootstrap and necessary plugins -->
<script src="{{ url('admin/js/libs/jquery.min.js') }}"></script>
<script src="{{ url('admin/js/libs/tether.min.js') }}"></script>
<script src="{{ url('admin/js/libs/bootstrap.min.js') }}"></script>
</body>

</html>