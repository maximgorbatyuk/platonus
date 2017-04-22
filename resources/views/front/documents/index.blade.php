
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

                {{ link_to_action('DocumentFrontController@create', 'Создать запись', [], ['class'=>'btn btn-outline-indigo', 'id' => 'load-button']) }}
            </div>
        </div>

        <div class="my-2">
            @php
                $last = count($instances) - 1;
                $start = 0;
            @endphp
            @for($i = 0; $i < count($instances); $i++)

                @php
                    $instance = $instances[$i];
                @endphp
                @if ($i % 3 == 0)

                    @php($start = $i)
                    <div class="row mt-1">

                @endif

                @include('front.documents._doc_cards')

                @if ($i == ($start + 2) || $i == $last)
                    </div>
                @endif

            @endfor
        </div>

    </div>


@endsection

@section('scripts')

    <script>
        (function(){
            application.initCardClickHandlers();
        }());
    </script>
@endsection