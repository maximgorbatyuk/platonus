
@extends('layouts._FrontLayout')

@php
    /** @var App\ViewModels\TestQuestionViewModel $model */;
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
                    @foreach($model->current_question->getVariants() as $variant)

                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="answer"> {{ $variant }}
                        </label>

                    @endforeach

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
