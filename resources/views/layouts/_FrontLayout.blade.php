<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="Platest, Platonus, тесты Плантонус, пробные тесты платонус, тестирование platonus, туран, университет, сессия" />
    <meta property="description" content="Портал для подготовки к сессии по системе Platonus методом пробных тестирования в домашних условиях.
      Можно воспользоваться уже загруженным документом, а можно и свой загрузить. Без регистрации и смс.
      Пройди тест, подготовься, получи высший бал на сессии, побереги себя и своих близких."/>
    @include('layouts._OpenGraphMeta')

    <meta name="robots" content="robots.txt">
    <meta name="yandex-verification" content="0eeb461100a51ff9" />

    <title>@yield('title', config('app.name', 'Platest').' - тесты, радость и веселье')</title>

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

    @if(!env('APP_DEBUG'))
        <noscript><div><img src="https://mc.yandex.ru/watch/43965764" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <script type="text/javascript"  src="{{ asset('thirdparty/yandex/metrica.js') }}"></script>
    @endif
    <script src="{{ asset('thirdparty/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('thirdparty/jquery/tether-1.4.0.min.js') }}"></script>
    <script src="{{ asset('bt/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('custom/js/application.js') }}"></script>
    <script>
        $(document).ready(function(){
            application.initScrollerToTop();
        });

    </script>

    @yield('scripts')
</body>
</html>