@extends('layouts._FrontLayout')

@section('content')

    <div id="jumb-back" class="jumbotron-fluid pt-10 pb-5">
        <div class="container text-center ">
            <div id="jumb-text">
                <h1 class="display-3 my-2">Platest</h1>
                <p class="lead">
                    Пробное тестирование Platonus
                </p>
            </div>

        </div>
    </div>

    <div class="container my-1">
        <div class="card">
            <div class="card-block">

                <h3 class="text-center">Загрузите документ</h3>

                @include('layouts.fine-uploader')
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('thirdparty/fineuploader/fine-uploader-new.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('scripts')
    <script src="{{ asset('thirdparty/fineuploader/fine-uploader.js') }}" type="text/javascript"></script>
    <script src="{{ asset('custom/js/fineWrapper.js') }}" type="text/javascript"></script>
    <script>
        // TODO Написать обработчик кнопки. ЧТобы открывалась после того как файл загрузили
        var fineWrapper = new FineWrapper();
    </script>
@endsection
