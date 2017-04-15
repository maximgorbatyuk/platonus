
@extends('layouts._FrontLayout')
@section('title', 'Загрузка нового документа')

@section('content')

    <div class="container my-1">
        <div class="card card-block">
            <h1 class="text-center">Загрузка файла</h1>
            <p class="text-center">
                Просто перетяни файл в область для загрузки и просмотри его, почувствуй его, пойми, как он важен для тебя.
                Только так ты сможешь выучить на стольник! А не сможешь, да и ладно, 50 ведь тоже проходной =) Принимаются только файлы *.docx
            </p>
            @include('front.fine-uploader')
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
        // TODO Написать обработчик кнопки. ЧТобы открывалась после того как файл загрузили

        var displayModal = function (body) {
            var modal = $('#notificationModal');
            modal.find('.modal-body').html(body);
            modal.modal('show');
        };

        var onSuccess = function(id, fileName, responseJSON) {

            if (responseJSON.success == true) {
                $('#fine-form').submit();
            }
        };

        var onError = function(id, name, errorReason, xhr) {

            var response = JSON.parse(xhr.responseText);
            var body = "Файл " + response.uploadName +" не был сохранен. <br>"+
                "Сервер ляпнул следующее:<br><b class='text-danger'>"+response.error+"</b>";
            displayModal(body);
        };

        var fineWrapper = new FineWrapper({
            onCompleteHandler : onSuccess,
            onErrorHandler : onError
        });
    </script>


@endsection