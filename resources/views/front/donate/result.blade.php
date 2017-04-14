@extends('layouts._FrontLayout')

@section('title', 'Platest - поддержка портала')

@section('content')

    <div class="container my-2">
        <div class="card card-block">
            <h1 class="display-3 text-center">Спасибо за поддержку</h1>

            <div class="mt-3 text-center">
                Я рад, что оказал(а) поддержку проекту! Надеюсь, что мой труд принес тебе пользу.
            </div>
            <div class="mt-3 text-center">
                <a class="btn btn-outline-indigo mr-1" href="/#topQuestions">
                    <span>Найти документ<i class="fa fa-search ml-1" aria-hidden="true"></i></span>
                </a>
                <a class="btn btn-outline-indigo ml-auto" href="/#loadNew">
                    <span>Загрузить новый<i class="fa fa-download ml-1" aria-hidden="true"></i></span>
                </a>
            </div>
        </div>


    </div>
@endsection
