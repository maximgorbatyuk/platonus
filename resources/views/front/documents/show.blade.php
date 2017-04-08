
@extends('layouts._FrontLayout')
@section('title', 'Документ')

@php
    /** @var App\ViewModels\DocumentFrontShowViewModel $model */
@endphp

@section('content')

    <div class="container mt-2">
        <div class="card">
            <div class="card-block">
                <h1>#{{ $model->document->id }} {{ $model->document->title }}</h1>
                <p class="text-muted">
                    Создан: {{ $model->document->CreatedAt() }}. Кол-во вопросов {{ count($model->questions) }}
                </p>
                <div class="mt-1">

                    <a class="btn btn-secondary float-md-left"
                       data-toggle="collapse" href="#questions" aria-expanded="false" aria-controls="questions">Раскрыть</a>
                    <a href="#" class="btn btn-primary float-md-right">Пройти тестирование</a>

                </div>
            </div>
        </div>
        <div class="mt-1">

            <div class="collapse" id="questions">
                <div class="card card-block">
                    <h3>Вопросы</h3>
                    @for($i = 1; $i <= count($model->questions); $i++)

                        @php
                            /** @var \App\LogicModels\Question $question */
                            $question = $model->questions[$i - 1];
                        @endphp
                        <dl class="row">
                            <dt class="col-sm-6">
                                {{ $i - 1 }}) {{ $question->getContent() }}
                            </dt>
                            <dd class="col-sm-6">
                                <ul>
                                    @php($variants = $question->getVariants())
                                    @for($n = 0; $n < count($variants); $n++)
                                        <li>
                                            @if ($n == 0)
                                                <i><u>{{ $variants[$n] }}</u></i>
                                            @else
                                                <span class="text-muted">
                                                    {{ $variants[$n] }}
                                                </span>
                                            @endif
                                        </li>
                                    @endfor
                                </ul>

                            </dd>

                        </dl>
                        <hr>
                    @endfor
                </div>
            </div>



        </div>

    </div>

@endsection