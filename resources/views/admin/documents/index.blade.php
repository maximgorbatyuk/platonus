
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
    <script src="{{ asset('thirdparty/dataTables/datatables.js') }}"></script>
    <script src="{{ asset('custom/js/DataTable.js') }}"></script>
    <script>
        $(document).ready(function(){
            var dataTable = new DataTable('dataTable');
            $(".dataTables_wrapper").css("width","100%");
        });
    </script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('thirdparty/dataTables/datatables.css') }}">
@endsection