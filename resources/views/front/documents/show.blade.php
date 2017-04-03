
@extends('layouts._FrontLayout')
@section('title', 'Документ')

@section('content')
    <div class="container my-2">
        <div class="mt-1">
            <h1>{{ $document->title }} [ID {{ $document->id }}]</h1>
            <p class="text-muted">Создание: {{ $document->created_at }}. Обновление: {{ $document->updated_at }}</p>
        </div>
        <div class="mt-1">
            <h3>Документ</h3>
            <dl class="row">
                <dt class="col-3 text-right">Описание</dt>
                <dd class="col-9">{{ $document->description }}</dd>

                <dt class="col-3 text-right">Имя файла</dt>
                <dd class="col-9">{{ $document->filename }}</dd>

            </dl>
        </div>
    </div>

@endsection