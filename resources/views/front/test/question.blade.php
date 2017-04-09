
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
                <div class="text-muted">5 вопрос из 25</div>
            </div>

            @if (isset($model))

                {{ Form::open(['action' => 'TestController@question', 'id' => 'question_form']) }}

                {{ Form::hidden('document_id', $model->document->id) }}
                {{ Form::hidden('limit', $model->limit) }}
                {{ Form::hidden('current_id', $model->current_question->getId()) }}
                {{ Form::hidden('display_correct', $model->display_correct) }}

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

                <div class="progress my-3">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

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
