<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('frontend') }}/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

</head>

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('frontend') }}/images/loading.gif" alt="#" /></div>
    </div>
    @include('layouts.partials.frontend-header')
    @yield('content')
    @include('layouts.partials.footer')

    @stack('js')

    <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/js/popper.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="{{ asset('frontend') }}/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{ asset('frontend') }}/js/custom.js"></script>
</body>

</html>
