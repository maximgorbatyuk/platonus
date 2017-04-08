
@php
    /** @var \App\Models\Document[] $instances */
@endphp

<table class="table table-striped dataTable">
    <thead>
    <tr>
        <th>Название</th>
        <th>Просмотры</th>
        <th>Создан</th>
    </tr>
    </thead>
    <tbody>
    @for($i=0;$i<count($instances);$i++)
        <tr>
            <td>{{ link_to_action('DocumentFrontController@show', $instances[$i]->title, ['id' => $instances[$i]->id]) }}</td>
            <td>{{ $instances[$i]->views  }}</td>
            <td>{{ $instances[$i]->CreatedAt()  }}</td>
        </tr>

    @endfor

    </tbody>
</table>