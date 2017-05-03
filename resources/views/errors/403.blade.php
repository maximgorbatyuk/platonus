@extends('layouts._FrontLayout')

@section('title', 'Отказано в доступе')

@section('content')

    <div class="container">
        <div class="text-center my-3">
            <h1 class="display-1 text-danger"><strong>403</strong></h1>
            <p class="lead my-2">
                Для просмотра данной страницы вы должны быть авторизованы
            </p>

            <p class="my-2 display-3">
                {{ \App\Helpers\Constants::NotFoundSmile }}
            </p>
        </div>

    </div>
@endsection