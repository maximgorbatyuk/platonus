
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

                <div class="text-muted d-inline-flex">
                    <dl class="row">
                        <dt class="col-sm-6  text-md-right">Просмотров</dt>
                        <dd class="col-sm-6">{{ $model->document->views }}</dd>

                        <dt class="col-sm-6  text-md-right">Вопросов</dt>
                        <dd class="col-sm-6">{{ $model->document->question_count }}</dd>
                    </dl>

                    <dl class="row ">
                        <dt class="col-sm-6 text-md-right">ID</dt>
                        <dd class="col-sm-6">{{ $model->document->id }}</dd>

                        <dt class="col-sm-6 text-md-right">Создан</dt>
                        <dd class="col-sm-6">{{ $model->document->CreatedAt() }}</dd>
                    </dl>

                </div>

                <div class="mt-1 d-flex w-100 justify-content-between">

                    <a href="{{ url('test') }}" class="btn btn-secondary">К документам</a>
                    <a href="{{ url('test/start/'.$model->document->id) }}" class="btn btn-primary">Начать тест <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>

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