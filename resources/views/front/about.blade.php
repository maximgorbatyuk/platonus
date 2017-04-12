@extends('layouts._FrontLayout')

@section('title', 'Platest - о портале')

@section('content')

    <div class="container my-2">
        <div class="card card-block">

            <div>
                <h1>О портале</h1>
                <p>
                    Портал, абзац которого ты сейчас читаешь, это система для подготовки студентов университета "Туран" и вообще любого университета,
                    сессия которого проходит методом тестирования в Платонусе (Platonus). А портал, который ты посетил, предоставляет возможность подготовиться,
                    постоянно испытывая себя пробными тестами. Ведь обучение - ничто без практики. Как и практика - ничто без обучения.
                    Ну что филосовствовать-то. Суть, в общем-то, в том, что только практикуясь постоянно, можно отточить свои знания.
                </p>
            </div>

            <div class="mt-3">
                <h3>История проекта</h3>
                <p>
                    Идея проекта зародилась еще в далеком и бородатом 2014 году, когда я только учился разрабатывать программы. Тогда это было только экзешником
                    для компьютера, и только Windows. Программа понимала только txt-файлы, что заставляло пользователей копировать весь текст
                    из файла вопросов в новый текстовый, и только потом он мог быть распознан.
                </p>
                <p>
                    К тому же, для работы требовался дополнительный пакет программных "драйверов",
                    именуемый .Net Framework. Я столько раз делал одно и то же, объясняя в Вконтакте (еще со старым дизайном), что нужно сделать, чтобы программа заработала.
                    Но это - процесс создания, и в этом ничего нет плохого. Этот опыт "внедрения" дал мне многое.
                </p>
            </div>

            <div class="mt-3">
                <h3>Правила пользования порталом</h3>
                <p>
                    Правила пользования порталом просты: тесты дает преподаватель, а ты их сюда загружаешь и проходишь. А может уже и староста твоей группы залил,
                    кто знает? Проверь обязательно, незачем дублировать документы на диске. Самое главное, чтобы тесты были <u><i>оформлены правильно</i></u>:
                    вопрос должен быть помечен тегом <u>&lt;question&gt;</u>, а варианты - <u>&lt;variant&gt;</u>. Это - первое правило нашего клуба - только отформатированные тесты. Иначе система просто не распознает текст {{ \App\Helpers\Constants::NotFoundSmile }}
                </p>
            </div>

            <div class="mt-3">
                <h3>Обо мне</h3>

                <div class="d-flex w-100 justify-content-between">
                    <p>
                        Понимаю, что не все здесь читать обо мне, но если кому-то интересно,
                        то раскройте текст  и "наслаждайтесь".
                    </p>
                    <a  class="btn btn-secondary" data-toggle="collapse" href="#aboutme" aria-expanded="false" aria-controls="collapseExample">Раскрыть</a>
                </div>
                <div  class="collapse hidden-text-block mt-2" id="aboutme">
                    <p>
                        Я, как студент, увидел необходимость в создании такой системы, где я смог бы попробовать пройти тест,
                        и я же, как разработчик, создал этот портал именно с этой целью. Если коротко обо мне, то вот краткая история моей жизни.
                    </p>
                    <p>
                        Меня зовут Горбатюк Максим, мне вот уже [нынешний год - 1993]  лет.
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
                        <img src="{{ asset('images/iceking.jpg') }}" id="icegif">
                    </div>

                </div>

            </div>

            <div class="mt-3">
                <h3>Поддержать проект</h3>
                <div class="d-flex w-100 justify-content-between">
                    <p>
                        Здесь скрыт абзац о том, что любая поддержка проекта приветствуется. Если тебе интересно, то милости прошу
                    </p>
                    <a class="btn btn-secondary" data-toggle="collapse" href="#support" aria-expanded="false" aria-controls="collapseExample">Раскрыть</a>

                </div>

                <div class="collapse hidden-text-block  mt-2" id="support">
                    <p>
                        Я разрабатываю проект в свое свободное время, получая взамен моральное удовлетворение своей потребности в самовыражении и самоутверждении,
                        если выражаться по-умному. Мне нравится слышать, что люди благоадрны мне за существование моего проекта, что он им пригодился.
                        Однако сейчас условия немного поменялись.
                    </p>
                    <p>
                        Раньше я тратил только свое время, а теперь я вынужден тратить и свои финансы на содержание хостинга этого портала.
                        Доменное имя бесплатное до апреля 2018го года, а вот хостинг стоит 10$ в месяц. Поэтому, если ты с помощью моего портала заработал(а) балл выше,
                        чем мог бы, если бы не протестировал себя заранее, и если ты ценишь затраченный мною труд, то я буду рад любому пожертвованию.
                    </p>
                    <div>
                        К сожалению, казахстанского сервиса приема платежей без конских комиссий как для жертвующего, так и для меня, я не нашел,
                        поэтому буду благодарен, если ты закинешь деньги на <a href="https://kaspi.kz/guide/wallet/#q28" title="Kaspi.kz">Kaspi Кошелек</a>.
                        Необходимо ввести номер телефона владельца кошелька (мой номер) и дату рождения. Не торопись закидывать деньги сразу, будь внимателен.
                        Будет обидно, если ты закинешь денег другому человеку по ошибке, и в итоге придется "выхаживать" свои деньги назад через различные инстанции.
                        Мои контактные данные для внесения платежа:
                        <dl>
                            <dt>Номер телефона</dt>
                            <dd>+7 (701) 762-07-87</dd>

                            <dt>Дата рождения</dt>
                            <dd>19 октября 1993 (19.10.1993)</dd>
                        </dl>
                    </div>
                </div>
            </div>

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
