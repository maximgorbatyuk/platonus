
@extends('layouts._ErrorLayout')

@section('content')

    <div class="container">
        <div class="text-center pt-10 pb-5">
            <h1 class="display-1 text-danger"><strong>Упс!</strong></h1>
            <p class="lead mt-3">
                Как интересно, во время обработки запроса возникла системная ошибка!
            </p>

            <p class="text-danger lead mt-3">
                {{ $exception->getMessage() ?? "" }}
            </p>
        </div>

    </div>
@endsection