
    @php
        /** @var \App\Models\Document $instance */
    @endphp

    <div class="col-md-4 mt-2">
        <div class="card card-block h-100">
            <a href="{{ url('documents/'.$instance->id) }}" class="h5">
                #{{ $instance->title }}
            </a>

            <div class="text-muted">
                <dl class="row">
                    <dt class="col-sm-6">ID</dt>
                    <dd class="col-sm-6">{{ $instance->id }}</dd>

                    <dt class="col-sm-6">Просмотров</dt>
                    <dd class="col-sm-6">{{ $instance->views }}</dd>

                    <dt class="col-sm-6">Вопросов</dt>
                    <dd class="col-sm-6">{{ $instance->question_count }}</dd>
                </dl>
            </div>
        </div>
    </div>