
@extends('layouts._FrontLayout')
@section('title', 'Загрузка нового документа')

@section('content')
    <div class="container">
        <h1 class="mt-2">Новый документ</h1>
        {!! Form::open(array('action' => array('DocumentController@store'))) !!}
            @include('admin.documents.form')
        {!! Form::close() !!}
    </div>


@endsection

@section('scripts')

@endsection