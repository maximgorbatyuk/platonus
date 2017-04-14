@extends('layouts._FrontLayout')

@section('title', 'Platest - о портале')

@section('content')

    <div class="container my-2">
        <div class="card card-block">
            <h1>Поддержать проект</h1>

            <div class="my-2">
                Я разрабатываю проект в свое свободное время, получая взамен моральное удовлетворение своей потребности в самовыражении и самоутверждении,
                если выражаться по-умному. Мне нравится слышать, что люди благодарны мне за существование моего проекта, что он им пригодился.
                Да и работающий проект в портфолио отлично смотрится.
                Однако сейчас условия немного поменялись.
            </div>

            <div class="my-2">
                Раньше я тратил только свое время, а теперь я вынужден тратить и свои финансы на содержание хостинга этого портала.
                Доменное имя бесплатное до апреля 2018го года, а вот хостинг стоит 10$ в месяц. Поэтому, если ты с помощью моего портала заработал(а) балл выше,
                чем мог бы, если бы не протестировал себя заранее, и если ты ценишь затраченный мною труд, то я буду рад любой поддержке.
            </div>
        </div>

        <div class="card card-block my-2">
            <h3>Виды поддержки</h3>
            <p class="text-muted">
                Какую поддержку ты можешь оказать проекту
            </p>

            <div class="row">
                <div class="col-md-4 h-100 text-md-center">
                    <b>1. Сказать "спасибо" при встрече или <a href="https://vk.com/maximgorbatyuk" title="Профиль разработчика">Вконтакте</a></b>
                    <br>
                    <div class="text-muted">Моральная поддержка не менее важна для меня, чем материальная</div>
                </div>

                <div class="col-md-4 h-100 text-md-center">
                    <b>2. Подарить шоколадку</b>
                    <div class="text-muted">Особенно я люблю шоколад "Казахстанский" от Рахат</div>
                </div>

                <div class="col-md-4 h-100 text-md-center">
                    <b>3. Финансовая помощь</b>
                    <div class="text-muted">Не буду лукавить, что не хочу денег =)</div>
                </div>
            </div>
        </div>

        <div class="card card-block my-2">
            <h3>Финансовая поддержка</h3>
            <div class="my-2">
                К сожалению, казахстанского сервиса приема платежей без конских комиссий как для жертвующего, так и для меня, я не нашел,
                поэтому буду благодарен, если ты закинешь деньги на <a href="https://kaspi.kz/guide/wallet/#q28" title="Kaspi.kz" target="_blank">Kaspi Кошелек</a>.
                Необходимо ввести номер телефона владельца кошелька (мой номер) и дату рождения. Не торопись закидывать деньги сразу, будь внимателен.
                Будет обидно, если ты закинешь денег другому человеку по ошибке, и в итоге придется "выхаживать" свои деньги назад через различные инстанции.
                Мои контактные данные для внесения платежа:

            </div>

            <div class="">
                <dl class="mt-2">
                    <dt>Номер телефона</dt>
                    <dd>+7 (701) 762-07-87</dd>

                    <dt>Дата рождения</dt>
                    <dd>19 октября 1993 (19.10.1993)</dd>
                </dl>
            </div>
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
