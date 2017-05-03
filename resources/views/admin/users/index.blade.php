
@extends('layouts._FrontLayout')
@section('title', 'Список пользователей')

@php
    /** @var \App\User[] $instances */
@endphp

@section('content')
    <div class="container">
        <h1 class="mt-2">Пользователи системы</h1>

        <div class="my-2">
            <a href="{{ url('/admin/users/create') }}" class="btn btn-link">Создать запись</a>
        </div>

        <table class="table table-striped dataTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Админ</th>
                <th>Создан</th>
            </tr>
            </thead>
            <tbody>
            @for($i=0;$i<count($instances);$i++)
                <tr>
                    <td>{{ $instances[$i]->id }}</td>
                    <td>{{ link_to_action('UserController@show', $instances[$i]->name , ['id' => $instances[$i]->id]) }}</td>
                    <td>{{ $instances[$i]->email  }}</td>
                    <td>{{ $instances[$i]->is_admin  }}</td>
                    <td>{{ $instances[$i]->created_at  }}</td>
                </tr>

            @endfor

            </tbody>
        </table>
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