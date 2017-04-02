
@extends('layouts._FrontLayout')
@section('title', 'Документ')

@section('content')
    <div class="container">
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

                <dt class="col-3 text-right">Путь загрузки</dt>
                <dd class="col-9">{{ $document->path }}</dd>

                <dt class="col-3 text-right">Загрузил</dt>
                <dd class="col-9">{{ $document->authorId }}</dd>
            </dl>
            <hr>
            <h3>Файл</h3>
            <dl class="row">
                <dt class="col-3 text-right">ID</dt>
                <dd class="col-9">{{ $file->id }}</dd>

                <dt class="col-3 text-right">Имя файла</dt>
                <dd class="col-9">{{ $file->filename }}</dd>

                <dt class="col-3 text-right">UUID</dt>
                <dd class="col-9">{{ $file->uuid }}</dd>

                <dt class="col-3 text-right">Обновлен</dt>
                <dd class="col-9">{{ $file->updated_at }}</dd>
            </dl>



        </div>
        <hr>

        <div class="mt-1">
            <div class="row">
                <div class="col-md-6">
                    {{ link_to_action('DocumentController@index', 'В список', null, ['class' => 'btn btn-secondary']) }}
                </div>

                <div class="col-md-6 text-sm-right">
                    {{ link_to_action('DocumentController@edit', 'Редактировать', ['id' => $document->id], ['class' => 'btn btn-primary']) }}
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
                {!! Form::open(['method' =>'delete', 'action' => ['DocumentController@destroy', $document->id]]) !!}
                <div class="modal-body">
                    Вы уверены, что хотите удалить документ #{{ $document->id }}?
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