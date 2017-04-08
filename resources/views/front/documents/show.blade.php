
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

                <div class="mt-1">

                    <a class="btn btn-secondary float-md-left"
                       data-toggle="collapse" href="#questions" aria-expanded="false" aria-controls="questions">Раскрыть вопросы</a>
                    {{ link_to_action('TestController@start', 'Начать тестирование',
                        ['id' => $model->document->id],
                        ['class'=>'btn btn-primary float-md-right']) }}

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