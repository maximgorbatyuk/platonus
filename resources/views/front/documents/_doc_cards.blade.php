
    @php
        /** @var \App\Models\Document $instance */
    @endphp

    <div class="col-md-4 mt-md-2 my-4">
        <div class="card h-100">
            <div class="card-block mb-0">
                <a href="{{ url('documents/'.$instance->id) }}" class="h5">
                    #{{ $instance->title }}
                </a>

                <div class="text-muted d-flex w-100 justify-content-between">
                    <div>ID: {{ $instance->id }}</div>
                    <div>Просмотров: {{ $instance->views }}</div>
                    <div>Вопросов: {{ $instance->question_count }}</div>
                </div>
            </div>
            <div class="mt-0 w-100">
                <a href="{{ url('documents/'.$instance->id) }}" class="btn-card btn-primary w-100">Открыть</a>
            </div>
        </div>
    </div>