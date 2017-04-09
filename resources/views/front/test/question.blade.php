
@extends('layouts._FrontLayout')

@php
    /** @var App\ViewModels\TestQuestionViewModel $model */;
    $variants = $model->current_question->getVariants();
@endphp

@section('title', 'Вопрос #')

@section('content')

    <div class="container my-2">
        <div class="card card-block">

            <h2>Тестирование </h2>

            @if (isset($model))

                {{ Form::open(['action' => 'TestController@question']) }}

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
                        <label class="form-check-label">
                            <input
                                    class="form-check-input"
                                    type="radio"
                                    name="answer"
                                    value="{{ $variants[$i] }}" {{ ($i == 0 ? "checked" : "") }}> {{ $variants[$i] }}
                        </label>
                    </div>

                @endfor

                {{Form::close()}}

            @else
                <pre>
                   {{ \App\Helpers\VarDumper::dump(Request::all()) }}
                </pre>

            @endif



        </div>
    </div>
@endsection
