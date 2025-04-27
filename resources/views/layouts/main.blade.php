<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>@yield('title') Maggoplastgel</title>

    <meta name="author" content="Maggoplastgel.com">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Boostrap style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('stylesheet/bootstrap.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('stylesheet/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stylesheet/custom.css') }}">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('stylesheet/responsive.css') }}">

    <!-- icoomon font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('stylesheet/icomoon.css') }}">

    <!-- Favicon and touch icons  -->
    <link href="{{ asset('icon/Favicon.png') }}" rel="apple-touch-icon-precomposed">
    <link href="{{ asset('icon/Favicon.png') }}" rel="apple-touch-icon-precomposed">
    <link href="{{ asset('icon/Favicon.png') }}" rel="shortcut icon">

    <!-- anime -->
    <link rel="stylesheet" href="{{ asset('stylesheet/animate.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('style')

</head>

<body>

    <div class="boxed blog">

        @include('components.main-header')

        @include('components.alert')


        @yield('main')



        <!-- btn go top -->
        @include('components.scroll-up')
        <!-- / btn go top -->

        @include('components.main-footer')

        <!-- Javascript -->
        <script type="text/javascript" src="{{ asset('javascript/jquery.min.js') }}"></script>
        <script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('javascript/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('javascript/owl.carousel.js') }}"></script>
        <script type="text/javascript" src="{{ asset('javascript/jquery-validate.js') }}"></script>
        <script type="text/javascript" src="{{ asset('javascript/jquery.easing.js') }}"></script>
        <script type="text/javascript" src="{{ asset('javascript/jquery.cookie.js') }}"></script>
        <script type="text/javascript" src="{{ asset('javascript/waypoints.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('javascript/countto.js') }}"></script>
        <script type="text/javascript" src="{{ asset('javascript/wow.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('javascript/main.js') }}"></script>
        <script type="text/javascript" src="{{ asset('javascript/chat-ai.js') }}"></script>
        <!-- /javascript -->

        <!-- slider -->
        <script src="{{ asset('rev-slider/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script src="{{ asset('rev-slider/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('javascript/rev-slider.js') }}"></script>
        <script src="{{ asset('javascript/custom.js') }}"></script>

        <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
        <script src="{{ asset('rev-slider/js/extensions/extensionsrevolution.extension.actions.min.js') }}"></script>
        <script src="{{ asset('rev-slider/js/extensions/extensionsrevolution.extension.carousel.min.js') }}"></script>
        <script src="{{ asset('rev-slider/js/extensions/extensionsrevolution.extension.kenburn.min.js') }}"></script>
        <script src="{{ asset('rev-slider/js/extensions/extensionsrevolution.extension.layeranimation.min.js') }}"></script>
        <script src="{{ asset('rev-slider/js/extensions/extensionsrevolution.extension.migration.min.js') }}"></script>
        <script src="{{ asset('rev-slider/js/extensions/extensionsrevolution.extension.navigation.min.js') }}"></script>
        <script src="{{ asset('rev-slider/js/extensions/extensionsrevolution.extension.parallax.min.js') }}"></script>
        <script src="{{ asset('rev-slider/js/extensions/extensionsrevolution.extension.slideanims.min.js') }}"></script>
        <script src="{{ asset('rev-slider/js/extensions/extensionsrevolution.extension.video.min.js') }}"></script>

        @stack('scripts')
    </div>

</body>

</html>
