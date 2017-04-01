
@extends('layouts._FrontLayout')
@section('title', 'Список документов')

@section('content')
    <div class="container">
        <h1 class="mt-2">Загруженные документы</h1>
        <div class="mb-1">
            <a href="#">Создать запись</a>
        </div>

        <table class="table table-striped dataTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>название</th>
                <th>Имя файла</th>
                <th>Путь</th>
                <th>Создан</th>
            </tr>
            </thead>
            <tbody>
            @for($i=0;$i<count($instances);$i++)
                <tr>
                    <td>{{ $instances[$i]->id }}</td>
                    <td>{{ link_to_action('DocumentController@show', $instances[$i]->title, ['id' => $instances[$i]->id]) }}</td>
                    <td>{{ $instances[$i]->filename  }}</td>
                    <td>{{ $instances[$i]->path  }}</td>
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