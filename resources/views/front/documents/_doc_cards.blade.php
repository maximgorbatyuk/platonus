
    @php
        /** @var \App\Models\Document $instance */
    @endphp

    <div class="col-md-4">
        <div class="card card-block text-md-center mt-1">
            <a href="{{ url('documents/'.$instance->id) }}" class="h5">
                {{ $instance->title }} #{{ $instance->id }}
            </a>

            <div class="text-muted">
                Просмотров: {{ $instance->views }} <br />
                Вопросов: {{ $instance->question_count }} <br />
            </div>
        </div>
    </div>