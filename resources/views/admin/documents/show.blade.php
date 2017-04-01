
@extends('layouts._FrontLayout')
@section('title', 'Документ')

@section('content')
    <div class="container">
        <div class="mt-1">
            <h1>{{ $instance->title }} [ID {{ $instance->id }}]</h1>
            <p class="text-muted">Создание: {{ $instance->created_at }}. Обновление: {{ $instance->updated_at }}</p>
        </div>


        <div class="mt-1">

            <dl class="row">
                <dt class="col-md-4">Описание</dt>
                <dd class="col-md-8">{{ $instance->description }}</dd>

                <dt class="col-md-4">Имя файла</dt>
                <dd class="col-md-8">{{ $instance->filename }}</dd>

                <dt class="col-md-4">Путь загрузки</dt>
                <dd class="col-md-8">{{ $instance->path }}</dd>

                <dt class="col-md-4">Загрузил</dt>
                <dd class="col-md-8">{{ $instance->authorId }}</dd>
            </dl>

        </div>
        <hr>

        <div class="mt-1">
            <div class="row">
                <div class="col-md-6">
                    {{ link_to_action('PostController@index', 'В список', null, ['class' => 'btn btn-secondary']) }}
                </div>

                <div class="col-md-6 text-sm-right">
                    {{ link_to_action('PostController@edit', 'Редактировать', ['id' => $instance->id], ['class' => 'btn btn-primary']) }}
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteDialog">Удалить</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="deleteDialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Удаление объекта</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['method' =>'delete', 'action' => ['DocumentController@destroy', $instance->id]]) !!}
                <div class="modal-body">
                    Вы уверены, что хотите удалить документ #{{ $instance->id }}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-outline-danger">Удалить</button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection