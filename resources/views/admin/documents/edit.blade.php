
@extends('layouts._FrontLayout')
@section('title', 'Редактирование документа')

@section('content')
    <div class="container">
        <h1 class="mt-2">Документ №{{ $instance->id }}</h1>
        {!! Form::model($instance, ['method' => 'PATCH', 'action' => ['DocumentController@update', $instance->id]]) !!}
            @include('admin.documents.form')
        {!! Form::close() !!}
    </div>


@endsection