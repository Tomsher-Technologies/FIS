<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <title>{{ env('APP_NAME') }} - {{ $title ?? '' }}</title> -->
    {!! SEO::generate() !!}
    @stack('seo')

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Archivo:400,400i,500,500i,600,600i,700,700i&amp;display=swap">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="{{ asset('css/font-awesome/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/flaticon/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" />

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup/magnific-popup.css') }}" />

    <!-- Template Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    @stack('header')
</head>

<body class="">

    @include('frontend.parts.header')

    @yield('content')

    @include('frontend.parts.footer')

    <!--=================================
    Back To Top-->
    <div id="back-to-top" class="back-to-top">up</div>
    <!--=================================
Back To Top-->

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('js/swiperanimation/SwiperAnimation.min.js') }}"></script>
    <script src="{{ asset('js/counter/jquery.countTo.js') }}"></script>
    <script src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('js/jarallax/jarallax-video.min.js') }}"></script>
    <script src="{{ asset('js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/shuffle/shuffle.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    @stack('footer')
</body>

</html>
