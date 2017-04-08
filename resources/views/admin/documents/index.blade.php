
@extends('layouts._FrontLayout')
@section('title', 'Список документов')

    @php
        /** @var \App\Models\Document[] $instances */
    @endphp

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
                    <td>{{ $instances[$i]->CreatedAt()  }}</td>
                </tr>

            @endfor

            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('thirdparty/dataTables/dataTables.min.js') }}"></script>
    <script>
        var url = '/thirdparty/dataTables/i18n/ru.json';
        $(document).ready(function(){
            $('.dataTable').DataTable({
                language: {
                    url: "http//cdn.datatables.net/plug-ins/1.10.13/i18n/Russian.json"
                }
            });
        });
    </script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('thirdparty/dataTables/dataTables.min.css') }}">
@endsection