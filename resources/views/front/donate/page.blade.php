@extends('layouts._FrontLayout')

@section('title', 'Platest - поддержка портала')

@section('content')

    <div class="container my-2">
        <div class="card card-block">
            <h1>Поддержать проект</h1>

            <div class="my-2">
                Разработчик развивает проект в свое свободное время, получая взамен моральное удовлетворение своей потребности в самовыражении и самоутверждении,
                если выражаться по-умному. Ему нравится слышать, что люди благодарны за существование такого проекта, что он им пригодился.
                Да и работающий проект в портфолио отлично смотрится. Однако сейчас условия немного поменялись.
            </div>

            <div class="my-2">
                Раньше автор тратил только свое время, а теперь он вынужден тратить и свои финансы на содержание хостинга этого портала.
                Доменное имя бесплатное до апреля 2018го года, а вот хостинг стоит 10$ в месяц. Поэтому, если ты с помощью этого портала заработал(а) балл выше,
                чем мог(ла) бы, если бы не протестировал(а) себя заранее, и если ты ценишь затраченный автором труд, то автор будет рад любой поддержке.
            </div>
        </div>

        <div class="card card-block my-2">
            <h3>Способы поддержки проекта</h3>
            <p class="text-muted">
                Какую поддержку ты можешь оказать проекту
            </p>

            <div class="row">
                <div class="col-md-4 h-100 text-md-center">
                    <b>1. Сказать "спасибо" при встрече или <a href="https://vk.com/maximgorbatyuk" title="Профиль разработчика">Вконтакте</a></b>
                    <br>
                    <div class="text-muted">Моральная поддержка не менее важна для автора, чем материальная</div>
                </div>

                <div class="col-md-4 h-100 text-md-center">
                    <b>2. Подарить шоколадку</b>
                    <div class="text-muted">Особенно автор любит шоколад "Казахстанский" от Рахат</div>
                </div>

                <div class="col-md-4 h-100 text-md-center">
                    <b>3. Финансовая помощь</b>
                    <div class="text-muted">Не будет лукавить автор, что он не хочет денег =)</div>
                </div>
            </div>
        </div>

        <div class="card card-block my-2">
            <h3>Финансовая поддержка</h3>
            <p>
                Поддержать проект финансово можно двумя способами:
                с помощью нашего казахстанского сервиса электронного кошелька <a href="https://kaspi.kz/guide/wallet/#q28" title="Kaspi.kz" target="_blank">Kaspi Кошелек</a>
                или через Яндекс.Деньги.
                Каким образом ты желаешь помочь автору - твой выбор, он за твое желание оказать поддержку уже благодарен.
            </p>

            <div class="row">
                <div class="col-md-6">
                    <div class="h5">Каспи кошелек</div>
                    <p>
                        Необходимо ввести номер телефона владельца кошелька (номер автора) и дату рождения. Не торопись закидывать деньги сразу, будь внимателен.
                        Будет обидно, если ты закинешь денег другому человеку по ошибке, и в итоге придется "выхаживать" свои деньги назад через различные инстанции.
                        Контактные данные автора, необходимые для внесения платежа:
                    </p>
                    <dl>
                        <dt>Номер телефона</dt>
                        <dd>+7 (701) 762-07-87</dd>

                        <dt>Дата рождения</dt>
                        <dd>19 октября 1993 (19.10.1993)</dd>
                    </dl>
                </div>

                @if(!$mobile)
                <div class="col-md-6">
                    <div class="h5">Яндекс.Деньги</div>
                    <p>
                        С Яндекс.Деньги гораздо легче осуществить пожертвование. Нужно лишь ввести данные карточки в форму.
                        Введите комментарий, сумму пожертвования и нажмите "Далее".
                    </p>
                    <iframe
                            frameborder="0"
                            allowtransparency="true"
                            scrolling="no"
                            src="https://money.yandex.ru/quickpay/shop-widget?account=410013945410045&quickpay=shop&payment-type-choice=on&writer=seller&targets=%D0%9F%D0%BE%D0%B4%D0%B4%D0%B5%D1%80%D0%B6%D0%BA%D0%B0+%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B0&targets-hint=&default-sum=100&button-text=04&comment=on&hint=%D0%9A%D0%BE%D0%BC%D0%BC%D0%B5%D0%BD%D1%82%D0%B0%D1%80%D0%B8%D0%B9+%D0%BF%D0%BE+%D0%B6%D0%B5%D0%BB%D0%B0%D0%BD%D0%B8%D1%8E&successURL=http%3A%2F%2Fplatest.tk%2F%3Freferrer%3Dyandex.money"
                            width="450"
                            height="270"></iframe>
                </div>
                @endif

            </div>



        </div>
    </div>
@endsection
