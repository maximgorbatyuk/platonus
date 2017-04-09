
@extends('layouts._FrontLayout')

@php
    /** @var \App\ViewModels\DocumentFrontShowViewModel $model */
@endphp

@section('title', 'Подготовка к тестированию')

@section('content')

    <div class="container my-2">
        <div class="card card-block">

            <h2>Тестирование {{ $model->document->title }}</h2>

            <div class="mt-2">

                <dl class="row">
                    <dt class="col-md-3 text-md-right">Название документа</dt>
                    <dd class="col-md-8">{{ $model->document->title }}</dd>

                    <dt class="col-md-3 text-md-right">Количество вопросов</dt>
                    <dd class="col-md-8">{{ $model->document->question_count }}</dd>

                </dl>
                <hr>
                {{ Form::open(['action' => 'TestController@question']) }}

                    {{ Form::hidden('document_id', $model->document->id) }}
                    {{ Form::hidden('question_count', $model->document->question_count) }}
                    {{ Form::hidden('current_id', null) }}

                    <div class="form-group row">
                        {{ Form::label('limit', 'Лимит вопросов', ['class' => 'col-md-3 col-form-label']) }}
                        <div class="col-md-9">
                            {{ Form::select('limit', [
                                '0' => 'Все вопросы',
                                '1' => '25 вопросов'
                            ], null, ['class' => 'form-control', 'required' => true]) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label('display_correct', 'Режим тестирования', ['class' => 'col-md-3 col-form-label']) }}
                        <div class="col-md-9">
                            {{ Form::select('display_correct', [
                                '1' => 'Подготовка (с указанием верного ответа)',
                                '0' => 'Аки сессия (нельзя подсмотреть верный ответ)'
                            ], null, ['class' => 'form-control', 'required' => true]) }}
                        </div>
                    </div>

                    <div class="form-group text-md-right">
                        <button type="submit" class="btn btn-primary">Начать тестирование</button>
                    </div>


                {{Form::close()}}

            </div>
        </div>
    </div>
@endsection
