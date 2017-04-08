
@extends('layouts._FrontLayout')
@section('title', 'Список документов')

@section('content')
    <div class="container">
        <h1 class="mt-2">Загруженные документы</h1>

        <table class="table table-striped dataTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Просмотры</th>
                <th>Создан</th>
            </tr>
            </thead>
            <tbody>
            @for($i=0;$i<count($instances);$i++)
                <tr>
                    <td>{{ $instances[$i]->id }}</td>
                    <td>{{ link_to_action('DocumentController@show', $instances[$i]->title, ['id' => $instances[$i]->id]) }}</td>
                    <td>{{ $instances[$i]->views  }}</td>
                    <td>{{ $instances[$i]->created_at  }}</td>
                </tr>

            @endfor

            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('thirdparty/dataTables/dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.dataTable').DataTable();
        });
    </script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('thirdparty/dataTables/dataTables.min.css') }}">
@endsection