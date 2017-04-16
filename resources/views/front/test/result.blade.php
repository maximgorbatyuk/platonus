
@extends('layouts._FrontLayout')

@php
    /** @var App\ViewModels\TestResultViewModel $model */
@endphp

@section('title', 'Результат тестирования')

@section('content')

    <div class="container my-2">
        <div class="card card-block">

            <h3 class="text-md-left text-center">Результат тестирования</h3>

            <div class="text-center mt-3">
                <div class="h1">{{ number_format($model->percent, 2)  }}%</div>
                <div class="text-muted">
                    {{ $model->correct_answers }} верных из {{ $model->question_count }} вопросов
                </div>
                <div class="h3 mt-2">
                    {{ $model->comment }}
                </div>
            </div>

            <div class="d-md-flex w-100 justify-content-between">
                {{ link_to_action('DocumentFrontController@index', 'Выбрать тест',
                        [], ['class'=>'btn btn-outline-indigo']) }}

                {{ link_to_action('TestController@start', 'Начать снова',
                    ['id' => $model->document->id],
                    ['class'=>'btn btn-indigo']) }}

            </div>
        </div>
        <div class="list-group mt-1">
            @for($i = 0; $i < count($model->user_answers); $i++)
                @php
                    $answer = $model->user_answers[$i];
                    $bg = $answer->isCorrect ? "bg-success-answer" : "bg-danger-answer";
                    $point = $answer->isCorrect ? 1 : 0;
                @endphp


                <div href="#" class="list-group-item flex-column align-items-start {{$bg}}">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="mb-1 h5">Вопрос #{{ $i + 1 }}</div>
                        <small>Балл: {{ $point }}</small>
                    </div>
                    <p class="mb-1">{{ $answer->content }}</p>
                    <p class="mb-1"><u><i>Правильный ответ:</i></u> {{ $answer->answer }}</p>

                    <small>
                        @if($answer->isCorrect)
                            Ответ правильный
                        @else
                            {{ $answer->answered }}
                        @endif
                    </small>
                </div>
            @endfor
        </div>
    </div>
@endsection
