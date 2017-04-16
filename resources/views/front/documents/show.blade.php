
@extends('layouts._FrontLayout')

@php
    /** @var App\ViewModels\DocumentFrontShowViewModel $model */
@endphp

@section('title', 'Документ '.$model->document->title)

@section('content')

    <div class="container mt-2">
        <div class="card">
            <div class="card-block">
                <h2>#{{ $model->document->id }} {{ $model->document->title }}</h2>
                <div class="text-muted mt-md-2 d-md-flex w-100 justify-content-between">
                    <div>ID: {{ $model->document->id }}.</div>
                    <div>Создан: {{ $model->document->CreatedAt() }}.</div>
                    <div>Вопросов: {{ $model->document->question_count }}.</div>
                    <div>Просмотров: {{ $model->document->views }}.</div>
                </div>

                <div class="row">
                    <div class="col-md-6 mt-1">
                        <a href="{{ url('test') }}" class="btn btn-secondary">К документам</a>
                        <a href="{{ url('download/'.$model->document->id) }}" class="btn btn-secondary">Скачать файл</a>
                    </div>

                    <div class="col-md-6 text-md-right mt-1">
                        <a href="{{ url('test/start/'.$model->document->id) }}" class="btn btn-indigo">Начать тест <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="list-group mt-1">

            @for($i = 1; $i <= count($model->questions); $i++)

                @php
                    /** @var \App\LogicModels\Question $question */
                    $question = $model->questions[$i - 1];
                @endphp

                <div class="list-group-item flex-column align-items-start">
                    <p class="my-1">
                        {{ $i - 1 }}) {{ $question->getContent() }}
                    </p>
                    <div class="mb-1">
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
                    </div>
                </div>

            @endfor
        </div>
    </div>

@endsection