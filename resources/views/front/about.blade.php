@extends('layouts._FrontLayout')

@section('title', 'Platest - о портале')

@section('content')

    <div class="container my-2">
        <div class="card card-block">
            <h1>О портале</h1>
            <p>
                Портал, абзац которого ты сейчас читаешь, это система для подготовки студентов ВУЗов,
                сессия которых проходит методом тестирования в Платонусе (Platonus). А портал, который ты посетил, предоставляет возможность подготовиться,
                постоянно испытывая себя пробными тестами. Ведь обучение - ничто без практики. Как и практика - ничто без обучения.
                Ну что филосовствовать-то. Суть, в общем-то, в том, что только практикуясь постоянно, можно отточить свои знания.
            </p>
        </div>

        <div class="card card-block mt-2">
            <h3>Правила пользования порталом</h3>
            <p>
                Правила пользования порталом просты: тесты дает преподаватель, а ты их сюда загружаешь и проходишь. А может уже и староста твоей группы залил,
                кто знает? Проверь обязательно, незачем дублировать документы на диске. Самое главное, чтобы тесты были <u><i>оформлены правильно</i></u>:
                вопрос должен быть помечен тегом <u>&lt;question&gt;</u>, а варианты - <u>&lt;variant&gt;</u>. Это - первое правило нашего клуба - только отформатированные тесты. Иначе система просто не распознает текст {{ \App\Helpers\Constants::NotFoundSmile }}
            </p>
        </div>


        <div class="card card-block mt-2">
            <h3>Поддержка проекта</h3>
            <p>
                Проект автор разрабатывает и развивает в свободное от работы время. Поэтому оказанная поддержка проекту будет принята с большой благодарностью.
                На <a href="{{url('donate')}}">этой странице</a> более подробная информация о возможных способах поддержки.
            </p>
        </div>


        <div class="card card-block mt-2">
            <h3>Связь с автором</h3>
            <p>
                Связаться с разработчиком портала можно тремя способами
            </p>

            <div class="row">
                <div class="col-md-4 h-100 text-md-center">
                    <b>Сообщения <a href="https://vk.com/maximgorbatyuk" title="Профиль разработчика">Вконтакте</a></b>
                    <br>
                    <div class="text-muted">Более предпочтительный способ</div>
                </div>

                <div class="col-md-4 h-100 text-md-center">
                    <b>Мессенджеры Whatsapp/Telegram и сотовая связь</b>
                    <div class="text-muted">+7(701)762-07-87</div>
                </div>

                <div class="col-md-4 h-100 text-md-center">
                    <b>Электронная почта</b>
                    <div class="text-muted"><a href="mailto:maximgorbatyuk191093@gmail.com" title="Написать на почту">maximgorbatyuk191093@gmail.com</a></div>
                </div>
            </div>
        </div>


        <div class="card card-block mt-2">
            <h3>История проекта</h3>
            <p>
                Идея проекта зародилась еще в далеком и бородатом 2014 году, когда автор только учился разрабатывать и писать программы.
                Тогда <a href="https://github.com/maximgorbatyuk/Test-Unit-Project">первая версия</a> была только экзешником
                для компьютера, и только Windows. Программа понимала только txt-файлы, что заставляло пользователей копировать весь текст
                из файла вопросов в новый текстовый, и только потом он мог быть распознан. <a href="https://github.com/maximgorbatyuk/Platonus-Tester">Вторая версия</a> проекта
                была гораздо лучше исполнена в техническом плане, однако сам подход к построению и распространению был неверен.
            </p>
            <p>
                К тому же, для работы требовался дополнительный пакет программных "драйверов",
                именуемый .Net Framework. Автор столько раз делал одно и то же, объясняя в Вконтакте (еще со старым дизайном),
                что нужно сделать, чтобы программа заработала. Но это - неотъемлемый процесс создания и внедрения,
                и в этом ничего нет плохого. Этот опыт "внедрения" дал многое.
            </p>
        </div>

        <div class="card card-block mt-2">
            <h3>Об авторе проекта</h3>

            <div class="d-md-flex w-100 justify-content-between">
                <p>
                    Разработчик понимает, что не все здесь на портале хотять читать о нем, но если кому-то интересно,
                    то раскройте текст и "наслаждайтесь".
                </p>
                <a  class="btn btn-secondary" data-toggle="collapse" href="#aboutme" aria-expanded="false" aria-controls="collapseExample">Раскрыть</a>
            </div>
            <div  class="collapse hidden-text-block mt-2" id="aboutme">
                <p>
                    Меня зовут Горбатюк Максим, мне вот уже [нынешний год - 1993]  лет.
                    Я, как студент, увидел необходимость в создании такой системы, где я смог бы попробовать пройти тест,
                    и я же, как разработчик, создал этот портал именно с этой целью. Если коротко обо мне, то вот краткая история моей жизни.
                </p>
                <p>
                    Вот моя <a href="https://vk.com/maximgorbatyuk" title="Моя вк-страничка">вк-страница</a> , если интересно заглянуть.
                    Работаю потихоньку, заканчиваю универ, пытаюсь найти свое место в жизни. На разработку проекта меня натолкнула мысль о том,
                    что было бы неплохо <del>подцепить девчонок</del> создать какой-нибудь проект, которым
                    пользовался бы не только я (да и то не всегда, что уж лукавить).
                    А увидев проблему в отсутствии системы подготовки к сессиям в моем универе - университете Туран - я решил,
                    что это - именно то, что необходимо людям. Мои одногруппники поддержали идею. Этот портал - третья версия проекта.

                </p>

                <p>
                    Если вот совсем обо мне интересно, то я увлекаюсь чтением литературы в жанре фантастики, учусь играть на гитаре и укулеле, хожу в спортзал,
                    а по вечерам сажусь за компьютер и начинаю кодить то что узнал нового в технологиях за день. Либо читаю что-то новое о технологиях,
                    чтобы завтра вечером сесть снова и кодить. Так и живу: работа-дом-учеба-дом-работаю Вот поэтому и этот абзац накатал здесьДа и вообще,
                    вся моя жизнь описывается одной гифкой:
                </p>
                <div class="text-center">
                    <img src="{{ asset('images/iceking.jpg') }}" class="img-fluid" id="icegif">
                </div>

            </div>

        </div>

        <div class="card card-block mt-2">

            <div class="h5">Пожелания от автора</div>
            <p>
                В общем, удачи тебе, дорогой друг, сдавай сессию аки бог на соточку,
                береги себя и своих близких.
            </p>

        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $(function() {
            $("#icegif").hover(
                function() {
                    $(this).attr("src", "{{ asset('images/iceking.gif') }}");
                },
                function() {
                    $(this).attr("src", "{{ asset('images/iceking.jpg') }}");
                }
            );
        });
    </script>

@endsection
