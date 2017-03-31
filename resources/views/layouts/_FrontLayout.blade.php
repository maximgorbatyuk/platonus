<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="robots.txt">

    <title>@yield('title', "Platest")</title>
    <!--title>{{ config('app.name', 'Laravel') }}</title-->

    <link href="{{ asset('bt/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('thirdparty/fa/font-awesome.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('custom/css/app.css') }}" rel="stylesheet">
    @yield('styles')

</head>
<body>

    @include("layouts._FrontNavigation")
    @include('flash::message')

    @yield('content')

    @include('layouts._FrontFooter')

    <script src="{{ asset('thirdparty/jquery/jquery-3.1.1.slim.min.js') }}"></script>
    <script src="{{ asset('thirdparty/jquery/tether-1.4.0.min.js') }}"></script>
    <script src="{{ asset('bt/js/bootstrap.min.js') }}"></script>

    @yield('scripts')
</body>
</html>