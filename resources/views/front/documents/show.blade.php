
@extends('layouts._FrontLayout')
@section('title', 'Документ')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-block">
                <h1>{{ $instance->title }} [ID {{ $instance->id }}]</h1>
                <p class="text-muted">Создание: {{ $instance->created_at }}. Обновление: {{ $instance->updated_at }}</p>

                <div class="mt-1">
                    <h3>Документ</h3>
                    <dl class="row">
                        <dt class="col-3 text-right">Описание</dt>
                        <dd class="col-9">{{ $instance->description }}</dd>

                        <dt class="col-3 text-right">Имя файла</dt>
                        <dd class="col-9">{{ $instance->filename }}</dd>

                    </dl>
                </div>
                <hr>
                <p>
                    {{ $content }}
                </p>
            </div>
        </div>

    </div>

@endsection