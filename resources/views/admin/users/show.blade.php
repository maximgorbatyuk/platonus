
@extends('layouts._FrontLayout')
@section('title', 'Информация о пользователе')

@php
    /** @var \App\User $instance */
@endphp

@section('content')
    <div class="container">
        <div class="mt-1">
            <h1>{{ $instance->name }} [ID {{ $instance->id }}]</h1>
            <p class="text-muted">Создание: {{ $instance->created_at }}</p>
        </div>


        <div class="mt-1">

            <h3>Информация</h3>
            <dl class="row">
                <dt class="col-3 text-right">Имя</dt>
                <dd class="col-9">{{ $instance->name }}</dd>

                <dt class="col-3 text-right">Email</dt>
                <dd class="col-9">{{ $instance->email }}</dd>

                <dt class="col-3 text-right">Админские права</dt>
                <dd class="col-9">{{ $instance->is_admin }}</dd>

            </dl>
        </div>
        <hr>

        <div class="mt-1">
            <div class="row">
                <div class="col-md-6">
                    {{ link_to_action('UserController@index', 'В список', null, ['class' => 'btn btn-secondary']) }}
                </div>

                <div class="col-md-6 text-sm-right">
                    {{ link_to_action('UserController@edit', 'Редактировать', ['id' => $instance->id], ['class' => 'btn btn-primary disabled']) }}
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
                {!! Form::open(['method' =>'delete', 'action' => ['UserController@destroy', $instance->id]]) !!}
                <div class="modal-body">
                    Вы уверены, что хотите удалить пользователя #{{ $instance->id }}?
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