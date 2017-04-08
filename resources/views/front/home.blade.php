@extends('layouts._FrontLayout')

@php
    /** @var App\ViewModels\HomePageViewModel $model */
@endphp

@section('content')

    <div id="jumb-back" class="jumbotron-fluid pt-10 pb-5">
        <div class="container text-center ">
            <div id="jumb-text">
                <h1 class="display-3 my-2">Platest</h1>
                <p class="lead">
                    Пробное тестирование Platonus
                </p>
                <div class="mt-1 mb-1">
                    <a class="btn btn-outline-orange mr-1" href="#topQuestions">
                        <span class="h5">Найти <i class="fa fa-search ml-1" aria-hidden="true"></i></span>
                    </a>
                    <a class="btn btn-outline-orange ml-auto" href="#loadNew">
                        <span class="h5">Загрузить <i class="fa fa-download ml-1" aria-hidden="true"></i></span></span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="container ">
        <div class="card card-block my-3">
            <h3 class="text-center" id="loadNew">Загрузи документ и начни тест</h3>
            <p class="text-center">
                Загрузи тест для того, чтобы начать тестирование и узнать, насколько ты заучка =)
            </p>
            @include('front.fine-uploader')
        </div>

        <div class="card card-block my-3">
            <h3 class="text-center" id="topQuestions">Топ-6 документов</h3>
            <div class="mt-1 text-center">
                Выбери тест из наиболее популярных и начни тест. Не нашел свой? <a href="{{ url('documents') }}">Поищи</a> в списке всех загруженных.
                <span class="float-md-right"><a href="{{ url('documents') }}" class="btn btn-outline-info">Все документы</a></span>
            </div>

            @for($i = 0; $i < count($model->documents); $i++)

                @php
                    $instance = $model->documents[$i];
                    $start = 0;
                @endphp
                @if ($i % 3 == 0)

                    @php($start = $i)
                    <div class="row mt-1">

                        @endif

                        @include('front.documents._doc_cards')

                        @if ($i == ($start + 2) || $i == count($model->documents) - 1)
                    </div>
                @endif

            @endfor

        </div>



    </div>

    <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Ошибка записи файла
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ну окей, бывает</button>
                </div>
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
        fineUploader.Initiate();




    </script>
@endsection
