
@extends('layouts._FrontLayout')

@php
    /** @var App\ViewModels\TestQuestionViewModel $model */;
    $variants = $model->current_question->getVariants();
@endphp

@section('title', 'Вопрос #')

@section('content')

    <div class="container my-2">
        <div class="card card-block">

            <div class="d-flex w-100 justify-content-between">
                <h2>Тестирование </h2>
                <div class="text-muted">{{ $model->current_pos+1 }} вопрос из {{ $model->question_count }}</div>
            </div>

            <div class="progress my-3">
                <div class="progress-bar"
                     role="progressbar"
                     style="width: {{ $model->progress_value }}%"
                     aria-valuenow="{{ $model->progress_value }}"
                     aria-valuemin="0"
                     aria-valuemax="100"></div>
            </div>

            @if (isset($model))

                {{ Form::open(['action' => 'TestController@question', 'id' => 'question_form']) }}

                {{ Form::hidden('document_id', $model->document->id) }}
                {{ Form::hidden('limit', $model->limit) }}
                {{ Form::hidden('current_pos', $model->current_pos) }}
                {{ Form::hidden('display_correct', $model->display_correct) }}
                {{ Form::hidden('show_swears', $model->show_swears) }}
                {{ Form::hidden('early_finish', false) }}

                {{ Form::hidden('question_order', \GuzzleHttp\json_encode($model->question_order)) }}
                {{ Form::hidden('answered_questions', \GuzzleHttp\json_encode($model->answered_questions)) }}
                {{ Form::hidden('answers', \GuzzleHttp\json_encode($model->answers)) }}

                <div class="form-group">
                    <p>
                        {{ $model->current_question->getContent() }}
                    </p>
                </div>

                @for($i = 0; $i < count($variants); $i++)

                    <div class="form-group">
                        <label class="form-check-label variant">
                            <input
                                    class="form-check-input"
                                    type="radio"
                                    name="answer"
                                    value="{{ $variants[$i] }}" {{ ($i == 0 ? "checked" : "") }}> {{ $variants[$i] }}
                        </label>
                    </div>

                @endfor



                <div class="form-group row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-outline-danger">Закончить</button>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <button type="button" class="btn btn-outline-success">Правильный</button>
                        <button type="submit" class="btn btn-primary">Далее <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                </div>



                {{Form::close()}}

            @else
                <pre>
                   {{ \App\Helpers\VarDumper::dump(Request::all()) }}
                </pre>

            @endif



        </div>
    </div>
@endsection
