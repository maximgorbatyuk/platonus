
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

            </div>



        </div>
    </div>
@endsection
