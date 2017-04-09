
@extends('layouts._FrontLayout')

@php
    /** @var App\ViewModels\TestQuestionViewModel $model */;
@endphp

@section('title', 'Вопрос #')

@section('content')

    <div class="container my-2">
        <div class="card card-block">

            <h2>Тестирование </h2>

            {{ Form::open(['action' => 'TestController@question']) }}
                {{ Form::hidden('document_id', $model->document->id) }}
                {{ Form::hidden('question_count', $model->document->question_count) }}
                {{ Form::hidden('current_id', null) }}

            {{Form::close()}}

        </div>
    </div>
@endsection
