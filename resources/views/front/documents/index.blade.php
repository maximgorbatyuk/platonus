
@extends('layouts._FrontLayout')
@section('title', 'Список документов')

@php
    /** @var \App\Models\Document[] $instances */
@endphp

@section('content')
    <div class="container">
        <h1 class="mt-2">Загруженные документы</h1>
        <div class="my-1 text-center">

            {{ link_to_action('DocumentFrontController@create', 'Создать запись', [], ['class'=>'btn btn-primary', 'id' => 'load-button']) }}
        </div>

        <div class="row">

            @for($i=0;$i<count($instances);$i++)

                @include('front.documents._doc_card')


            @endfor

        </div>
    </div>

@endsection

@section('scripts')

@endsection
@section('styles')

@endsection