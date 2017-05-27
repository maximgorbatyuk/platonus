@extends('layouts._FrontLayout')
@section('title', 'Благодарности пользователям портала')

@section('content')

    <div class="container mt-2">

        <div class="card card-block">
            <h1 class="my-3 text-md-center">Результаты проведенной работы</h1>

            <p>
                Вот и подошла к концу летняя сессия 2к17го года. На этой сессии впервые был внедрен портал для подготовки,
                и этот опыт внедрения очень важен для меня как разработчика. Я проанализировал и ваши действия, пользователи портала, и свои.
                Было достаточно моментов, когда я понимал, что налажал, и я вынес для себя урок из этого. А так же я понял,
                что внедрение и поддержка веб-портала в одиночку - это очень трудоемкий процесс, связанный не только с техническими трудностями,
                но и работой с пользователями и продвижением. В этом "письме", если можно так назвать данную страницу, которую Вы смотрите,
                я хотел бы подвести итоги.
            </p>
        </div>

        <div class="card card-block mt-2">
            <h3 class="mb-3 text-md-center">Благодарность</h3>
            <p>
                В первую очередь я хочу выразить свою огромнеюшую благодарность <u>Адилету Тельгожаеву</u> (<a href="https://vk.com/adik_adone">страница в ВК</a>),
                президенту студенческого самоуправления университета "Туран", не только за оказанную помощь в продвижении веб-портала и распространении информации о нем,
                но и за моральную поддержку.
            </p>
        </div>

        <div class="card card-block mt-2">
            <h3 class="my-3 text-md-center">Метрика и графики</h3>
            <p>
                Многие могли заметить, что я настроил Яндекс.Метрику для отслеживания статистики сайта. А если не заметили, то теперь точно знаете. И здесь я хотел бы
                поделиться с вами цифрами, которые показались мне очень интересными. Показывают они не только сухую статистику, но и отношение людей.
            </p>

            <p>
                Прежде чем перейти к цифрам, хотел бы показать вам графики.
            </p>
            <div class="mt-2">
                <h4  class="my-3 text-md-center">Визиты пользователей</h4>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('images/посещаемость.png') }}" class="" style="max-width: 100%;">
                    </div>

                    <div class="col-md-6">
                        <p>
                            График посещаемости показывает, что основная активность пользователей началась только с середины внедрения. 24 апреля я запустил сайт, написал новость
                            в паблик в ВК. Однако ожидаемого прироста юзеров не было. 2 мая Адилет закрепил пост о веб-портале в паблике, что дало результат. Рекорд посещаемости
                            был достигнут не так давно на отметке в 1396 пользователей. График показывает также интересную закономерность: по выходным студентам не до тестов.
                        </p>
                    </div>

                </div>



            </div>

            <div class="mt-2">
                <h4  class="my-3 text-md-center">Возраст посетителей</h4>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('images/возраст.png') }}" class="" style="max-width: 100%;">
                    </div>

                    <div class="col-md-6">
                        <p>
                            Довольно интересные данные показывает график возрастов юзеров: хоть основной ЦА веб-портала являются студенты,
                            можно заметить, что не только они посещают портал. Возможно, кто-то из преподавателей активно просматривает тесты.
                            За месяц работы сайт посетило 1538 человек в возрасте 25-34, 40 человек в возрасте 35-44 и
                            212 человек в возрасте 45-54 лет.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-2">
                <h4  class="my-3 text-md-center">Устройства посетителей</h4>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('images/устройства.png') }}" class="text-md-center" style="max-width: 100%;">
                    </div>

                    <div class="col-md-6">
                        <p>
                            61% устройств, с которых был запущен сайт, являются мобильными. Довольно интересный факт, подтверждающий приход пост-PC эры.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-block mt-2">
            <h3 class="mt-2 text-md-center">Цифры</h3>
            <p>А теперь самое интересное - сухие цифры, взятые из метрики и не только. Выборка дат: запуск проекта 24 апреля - 26 мая (2017), окончание сессии</p>

            <h5 class="mt-1 text-md-center">Факты о сайте и посещаемости</h5>
            <dl class="text-md-center row">
                <dd class="col-6 text-right">Посещений (кол-во)</dd>
                <dt class="col-6 text-left">11 625</dt>

                <dd class="col-6 text-right">Загружено документов (кол-во)</dd>
                <dt class="col-6 text-left">3 298</dt>

                <dd class="col-6 text-right">Просмотров у самого популярного документа (кол-во)</dd>
                <dt class="col-6 text-left">2 526</dt>

                <dd class="col-6 text-right">Начато тестирований (раз)</dd>
                <dt class="col-6 text-left">36 955</dt>

                <dd class="col-6 text-right">Закончено тестирований (раз)</dd>
                <dt class="col-6 text-left">28 783</dt>

                <dd class="col-6 text-right">Ответ на вопрос теста был дан (раз)</dd>
                <dt class="col-6 text-left">~ 1 млн 340 тыс</dt>

                <dd class="col-6 text-right">Самая непопулярная страница</dd>
                <dt class="col-6 text-left"><a href="{{ url('about') }}">О проекте</a> (372 просмотра)</dt>

                <dd class="col-6 text-right">Вторая самая непопулярная страница</dd>
                <dt class="col-6 text-left"><a href="{{ url('donate') }}">Поддержать проект</a> (790 просмотра)</dt>

                <dd class="col-6 text-right">Среднее время на сайте</dd>
                <dt class="col-6 text-left">1 час 25 минут 35 секунд</dt>

                <dd class="col-6 text-right">Кол-во просмотренных страниц одним посетителем в среднем</dd>
                <dt class="col-6 text-left">84,3 страницы</dt>

                <dd class="col-6 text-right">Среднее время на сайте</dd>
                <dt class="col-6 text-left">1 час 25 минут 35 секунд</dt>
            </dl>
        </div>

        <div class="card card-block mt-2">
            <h3 class="mt-2 text-md-center">Поддержка проекта by комьюнити</h3>
            <p>
                Отдельным пунктов я хотел бы показать некоторую статистику, связанную с пользователями портала
            </p>
            <dl class="text-md-center row">
                <dd class="col-6 text-right">Сказали "спасибо" в личку в ВК</dd>
                <dt class="col-6 text-left">25 человек</dt>

                <dd class="col-6 text-right">Написало с претензией на рабочее состояние во время нагрузок</dd>
                <dt class="col-6 text-left">5 человек</dt>

                <dd class="col-6 text-right">Пообещали помолиться боженьке за мое здоровье</dd>
                <dt class="col-6 text-left">1 человек</dt>

                <dd class="col-6 text-right"><u>Пообещали</u> помочь донатом</dd>
                <dt class="col-6 text-left">3 человека</dt>

                <dd class="col-6 text-right"><u>Поддержали</u> донатом реально</dd>
                <dt class="col-6 text-left">0 человек</dt>

                <dd class="col-6 text-right"><u>Пообещали</u> поддержать шоколадом</dd>
                <dt class="col-6 text-left">1 человек</dt>

                <dd class="col-6 text-right"><u>Поддержали</u> шоколадом</dd>
                <dt class="col-6 text-left">0 человек</dt>

                <dd class="col-6 text-right">Поработали бы над адаптивностью сайта</dd>
                <dt class="col-6 text-left">1 человек</dt>

                <dd class="col-6 text-right">Выявлено проблем с адаптивностью сайта</dd>
                <dt class="col-6 text-left">1 проблема и 1 пожелание "блок бы повыше"</dt>
            </dl>
        </div>

        <div class="card card-block mt-2">
            <h3 class="mt-2 text-md-center">Финансовые показатели</h3>
            <p>
                На сладкое я оставил для пользователей информацию, которую хочется знать всегда: кто сколько зарабатывает.
            </p>
            <dl class="text-md-center row">
                <dd class="col-6 text-right">Работало над проектом</dd>
                <dt class="col-6 text-left">1 человек</dt>

                <dd class="col-6 text-right">Вложено времени в проект</dd>
                <dt class="col-6 text-left">~ 40 часов (по 1-2 часа после работы)</dt>


                <dd class="col-6 text-right">Стоимость доменного имени</dd>
                <dt class="col-6 text-left">0$</dt>

                <dd class="col-6 text-right">Стоимость хостинга за месяц</dd>
                <dt class="col-6 text-left">10$</dt>

                <dd class="col-6 text-right">Вложено в проект разработчиком</dd>
                <dt class="col-6 text-left">20$ за хостинг, 40 часов личного времени и душа в количестве 1 ед.</dt>

                <dd class="col-6 text-right">Собрано за счет поддержки пользователей</dd>
                <dt class="col-6 text-left">0$</dt>

                <dd class="col-6 text-right">Заработок проекта</dd>
                <dt class="col-6 text-left">минус 20$</dt>
            </dl>
        </div>


    </div>

@endsection