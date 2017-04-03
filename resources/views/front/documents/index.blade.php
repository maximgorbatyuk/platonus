
@extends('layouts._FrontLayout')
@section('title', 'Список документов')

@section('content')
    <div class="container">
        <h1 class="mt-2">Загруженные документы</h1>
        <div class="my-1 text-center">

            {{ link_to_action('DocumentFrontController@create', 'Создать запись', [], ['class'=>'btn btn-primary', 'id' => 'load-button']) }}
        </div>

        <div class="row">

            @for($i=0;$i<count($instances);$i++)

                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">
                            {{ $instances[$i]->title }} #{{ $instances[$i]->id }}
                        </h4>

                        <div class="card-subtitle mb-2 text-muted">
                            {{ $instances[$i]->updated_at }}
                        </div>

                        <p class="card-text">
                            {{ $instances[$i]->description }}
                        </p>
                        {{ link_to_action('DocumentFrontController@show', 'Открыть', ['id' => $instances[$i]->id]) }}
                    </div>
                </div>

            @endfor

        </div>
    </div>

@endsection

@section('scripts')

@endsection
@section('styles')

@endsection