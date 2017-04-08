
    @php
        /** @var \App\Models\Document[] $instances */
    @endphp

    <div class="row">
        @for($i=0;$i<count($instances);$i++)
            <div class="col-md-4">
                <div class="card card-block text-md-center mt-1">
                    <a href="{{ url('documents/'.$instances[$i]->id) }}" class="h5">
                        {{ $instances[$i]->title }} #{{ $instances[$i]->id }}
                    </a>

                    <div class="text-muted">
                        Просмотров: {{ $instances[$i]->views }} <br />
                        Вопросов: {{ $instances[$i]->question_count }} <br />
                        Загружен: {{ $instances[$i]->CreatedAt() }}
                    </div>
                </div>
            </div>
        @endfor
    </div>