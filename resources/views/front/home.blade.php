@extends('layouts._FrontLayout')

@php
    /** @var App\ViewModels\HomePageViewModel $model */
@endphp

@section('content')

    <div id="jumb-back" class="jumbotron-fluid pt-10 pb-5">
        <div class="container text-center ">
            <div id="jumb-text" class="my-1 py-2">
                <h1 class="display-3">Platest</h1>
                <p class="lead">
                    Пробное тестирование Platonus
                </p>
                <div class="mt-1 mb-1">
                    <a class="btn btn-outline-orange mr-1" href="{{ url('documents') }}">
                        <span class="h5">Найти <i class="fa fa-search ml-1" aria-hidden="true"></i></span>
                    </a>
                    <a class="btn btn-outline-orange ml-auto" href="{{ url('documents/create') }}">
                        <span class="h5">Загрузить <i class="fa fa-download ml-1" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="container ">

        <div class="card card-block my-3">
            <h3 class="text-center" id="important">Важная информация</h3>
            <div class="mt-4">
                В силу определенных обстоятельств, связанных с тем, что ситуация, когда студенты получают тесты для подготовки, не очень-то и <u>легальна</u>,
                разработчик вынужден ограничить возможности неавторизованных пользователей, а именно запретить доступ без авторизации к следующим функциям:
            </div>
            <ul>
                <li>Загрузка новых документов</li>
                <li>Просмотр списка всех загруженных документов</li>
            </ul>
            <div class="mt-4">
                Остальные пользователи все так же могут просматривать документы по прямым ссылкам на них вида <u>http://platest.tk/documents/{id документа}</u>.
                Это не очень удобно, но другой выход требует времени на реализацию, а его у разработчика нет,
                ведь проект разрабатывается в свободное от работы время и держится лишь на энтузиазме.
            </div>
        </div>

        <div class="card card-block my-3">
            <h3 class="text-center" id="loadNew">О портале вкратце</h3>
            <div class="mt-4">
                Портал разработан для подготовки студентов, у которых сессия проходит методом тестирования в Платонусе (Platonus).
                Здесь ты можешь выучить тест за 5 минут до начала экзамена, и испытать себя пробным тестированием.
            </div>
            <div class="mt-4">
                <div class="h4 text-center">Правила пользования порталом просты</div>
                <ol>
                    <li>Выбираешь тест из списка или загружаешь свой <i class="fa fa-check text-success" aria-hidden="true"></i></li>
                    <li>Проходишь тест здесь пока не зазубришь <i class="fa fa-check text-success" aria-hidden="true"></i></li>
                    <li>Сдаешь тест на сессии на соточку аки Бог <i class="fa fa-check text-success" aria-hidden="true"></i></li>
                    <li>При необходимости повторить <i class="fa fa-check text-success" aria-hidden="true"></i></li>
                </ol>
            </div>
            <div class="mt-4">
                <div class="h4 text-center">Требования для документов</div>
                Самое главное, чтобы тесты были <u><i>оформлены правильно</i></u>:
                вопрос должен быть помечен тегом <u>&lt;question&gt;</u>, а варианты - <u>&lt;variant&gt;</u>.
                Это - первое правило нашего клуба - только отформатированные тесты.
                Иначе система просто не распознает текст {{ \App\Helpers\Constants::NotFoundSmile }}
            </div>
            <div class="my-4">
                <div class="h4 text-center">Пожелания</div>
                В общем, удачи тебе, дорогой друг, сдавай сессию на все 146% и радуйся жизни. Если тебе понравился портал и сервис, который он предоставляет,
                ты можешь поблагодарить разработчика, <a href="{{ url('donate') }}" title="Перейти на страниу поддержки проекта">поддержав проект</a> здесь же. Разработчик будет благодарен тебе
            </div>
        </div>

        <!--div class="card card-block my-3">
            <div class="h3 text-center" id="loadNew">Загрузи документ и начни тест</div>
            <p class="text-center">
                Загрузи тест для того, чтобы начать тестирование и узнать, насколько ты заучка =) Принимаются только файлы *.docx
            </p>
            <p class="text-center">
                <u>Внимание!</u> По техническим причинам система может распознать только текст документа.
                Не будет ни таблиц, ни картинок, прикрепленых к вопросам. Бывает, что сказать {{ \App\Helpers\Constants::NotFoundSmile }}
                Принимаются только файлы Word 2007-2016 (docx)
            </p>
            @include('front.fine-uploader')
        </div-->

        <!--div class="card card-block my-3">
            <div class="h3 text-center" id="topQuestions">Топ-6 документов</div>
            <div class="mt-1 text-center">
                Выбери тест из наиболее популярных и начни тест. Не нашел свой? <a href="{{ url('documents') }}">Поищи</a> в списке всех загруженных.
                <div class="mt-1">
                    <a href="{{ url('documents') }}" class="btn btn-outline-indigo">Все документы</a>
                </div>
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

        </div-->



    </div>

    <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="h5 modal-title">
                        Ошибка записи файла
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-indigo" data-dismiss="modal">Ну окей, бывает</button>
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
        (function(){
            //fineUploader.Initiate();
            //application.initCardClickHandlers();
        }());

    </script>
@endsection
