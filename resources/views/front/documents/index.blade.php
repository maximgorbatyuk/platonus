
@extends('layouts._FrontLayout')
@section('title', 'Список документов')

@php
    /** @var \App\Models\Document[] $instances */
@endphp

@section('content')
    <div class="container mt-2">
        <div class="card card-block">
            <h1 class="mt-2 text-md-center">Загруженные документы</h1>
            <p class="text-muted">
                Здесь выведены все документы, которые были загружены другими участниками веб-портала.
                Возможно, ты найдешь свой тест здесь, поэтому не торопись загрузить свой тест.
            </p>
            <div class="my-1 text-center">

                {{ link_to_action('DocumentFrontController@create', 'Создать запись', [], ['class'=>'btn btn-outline-info', 'id' => 'load-button']) }}
            </div>

            <div class="mt-1">

                <div class="row">
                    @foreach($instances as $instance)
                        @include('front.documents._doc_cards')
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('thirdparty/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('custom/js/DataTable.js') }}"></script>
    <script>
        $(document).ready(function(){
            var dataTable = new DataTable('dataTable');
            $(".dataTables_wrapper").css("width","100%");
        });
    </script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('thirdparty/dataTables/datatables.min.css') }}">
@endsection