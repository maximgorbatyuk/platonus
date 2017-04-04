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

    <noscript><div><img src="https://mc.yandex.ru/watch/43965764" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <script type="text/javascript"  src="{{ asset('thirdparty/yandex/metrica.js') }}"></script>
    <script src="{{ asset('thirdparty/jquery/jquery-3.1.1.slim.min.js') }}"></script>
    <script src="{{ asset('thirdparty/jquery/tether-1.4.0.min.js') }}"></script>
    <script src="{{ asset('bt/js/bootstrap.min.js') }}"></script>

    @yield('scripts')
</body>
</html>