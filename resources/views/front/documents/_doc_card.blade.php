
@php
    /** @var \App\Models\Document[] $instances */
@endphp

<div class="col-md-4">
    <div class="card">
        <div class="card-block">
            <h4 class="card-title">
                {{ $instances[$i]->title }} #{{ $instances[$i]->id }}
            </h4>

            <div class="card-subtitle mb-2 text-muted">
                Создан: {{ $instances[$i]->CreatedAt() }}<br />
                Просмотров: {{ $instances[$i]->views }}
            </div>

            <div class="text-sm-right">
                {{ link_to_action('DocumentFrontController@show', 'Открыть', ['id' => $instances[$i]->id],
                ['class' =>'btn btn-link'] ) }}
            </div>

        </div>
    </div>
</div>