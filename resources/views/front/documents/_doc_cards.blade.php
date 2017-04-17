
    @php
        /** @var \App\Models\Document $instance */
    @endphp

    <div class="col-md-4 mt-md-2 my-4">
        <div class="card h-100 document-card" data-document-id="{{ $instance->id }}">
            <div class="card-block mb-0">
                <div class="h5">
                    {{ $instance->title }}
                </div>

                <div class="text-muted d-md-flex w-100 justify-content-between">
                    <div>ID: {{ $instance->id }}</div>
                    <div><i class="fa fa-eye" aria-hidden="true"></i> {{ $instance->views }} </div>
                    <div>Вопросов: {{ $instance->question_count }}</div>
                </div>
            </div>
            <div class="mt-0 w-100">
                <a href="{{ url('documents/'.$instance->id) }}" class="btn-card btn-indigo w-100">Открыть</a>
            </div>
        </div>
    </div>