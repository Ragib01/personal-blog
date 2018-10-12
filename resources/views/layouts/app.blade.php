<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="corporate, creative, general, portfolio, photography, blog, e-commerce, shop, product, gallery, retina, responsive">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="{{ url('app/assets/img/favicon.png')}}">

    <title>@yield('title')</title>

    <!--common style-->
    <link href='http://fonts.googleapis.com/css?family=Abel|Source+Sans+Pro:400,300,300italic,400italic,600,600italic,700,700italic,900,900italic,200italic,200' rel='stylesheet' type='text/css'>

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('app/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('app/assets/vendor/animate/animate.css')}}">
    <link rel="stylesheet" href="{{ url('app/assets/vendor/elasic-slider/elastic.css')}}">
    <link rel="stylesheet" href="{{ url('app/assets/vendor/iconmoon/linea-icon.css')}}">
    <link rel="stylesheet" href="{{ url('app/assets/vendor/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ url('app/assets/vendor/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ url('app/assets/vendor/owl-carousel/owl.theme.css')}}">
    <link rel="stylesheet" href="{{ url('app/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ url('app/assets/css/shortcodes.css')}}">
    <link rel="stylesheet" href="{{ url('app/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ url('app/assets/css/secondary.css')}}">
    <link rel="stylesheet" href="{{ url('app/assets/css/default-theme.css')}}">
    <!-- endinject -->


</head>
<body>

<div class="wrapper">

    @include('inc_app.header')
    @yield('hero')

    <section class="body-content">
        @yield('content')
    </section>
    <!--footer 1 start -->
    <footer id="footer" class="dark">
        <div class="primary-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="#" class="m-bot-20 footer-logo">
                            <img class="retina" src="{{url('app/assets/img/logo-dark.png')}}" alt="" />
                        </a>
                        <p>This is a Personal Blog site.</p>

                    </div>
                    <div class="col-md-3">
                        <h5 class="text-uppercase">Menu</h5>
                        <ul class="f-list">
                            <li><a href="{{ route('home_index') }}">Home</a>
                            </li>
                            <li><a href="{{ route('blog_index') }}">Blog</a>
                            </li>
                            <li><a href="{{ route('project_index') }}">Projects</a>

                            <li><a href="{{ route('research_index') }}">Research</a>
                            </li>
                            <li><a href="{{ route('gallery_index') }}">Gallery</a>
                            </li>
                            <li><a href="{{route('about_index')}}">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="secondary-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span class="m-top-10">Developed by <a href="#" class="f-link">Proximio</a> | All Rights Reserved</span>
                    </div>
                    <div class="col-md-6">
                        <div class="social-link circle pull-right">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer 1 end-->

</div>
        <!-- inject:js -->
        <script src="{{ url('app/assets/vendor/modernizr/modernizr.js')}}"></script>
        <script src="{{ url('app/assets/vendor/jquery/jquery-1.10.2.min.js')}}"></script>
        <script src="{{ url('app/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ url('app/assets/vendor/breakpoint/breakpoint.js')}}"></script>
        <script src="{{ url('app/assets/vendor/count-to/jquery.countTo.js')}}"></script>
        <script src="{{ url('app/assets/vendor/countdown/jquery.countdown.js')}}"></script>
        <script src="{{ url('app/assets/vendor/easing/jquery.easing.1.3.js')}}"></script>
        <script src="{{ url('app/assets/vendor/easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
        <script src="{{ url('app/assets/vendor/elasic-slider/jquery.eislideshow.js')}}"></script>
        <script src="{{ url('app/assets/vendor/flex-slider/jquery.flexslider-min.js')}}"></script>
        <script src="{{ url('app/assets/vendor/gmap/jquery.gmap.min.js')}}"></script>
        <script src="{{ url('app/assets/vendor/images-loaded/imagesloaded.js')}}"></script>
        <script src="{{ url('app/assets/vendor/isotope/jquery.isotope.js')}}"></script>
        <script src="{{ url('app/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ url('app/assets/vendor/mailchimp/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{ url('app/assets/vendor/menuzord/menuzord.js')}}"></script>
        <script src="{{ url('app/assets/vendor/nav/jquery.nav.js')}}"></script>
        <script src="{{ url('app/assets/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{ url('app/assets/vendor/smooth/smooth.js')}}"></script>
        <script src="{{ url('app/assets/vendor/touchspin/touchspin.js')}}"></script>
        <script src="{{ url('app/assets/vendor/typist/typist.js')}}"></script>
        <script src="{{ url('app/assets/vendor/sticky/jquery.sticky.min.js')}}"></script>
        <script src="{{ url('app/assets/vendor/visible/visible.js')}}"></script>
        <script src="{{ url('app/assets/vendor/wow/wow.min.js')}}"></script>')}}
        <script src="{{ url('app/assets/js/scripts.js')}}"></script>
        <!-- endinject -->

</body>


</html>
