
<div class="mt-1">
    <div class="form-group">
        {{ Form::label('title', 'Заголовок документа') }}
        {{ Form::text('title', old('title'),
                array('class' => 'form-control', 'required', 'maxlength' => '100', 'placeholder' => 'Введите название документа')) }}
        @if ($errors->has('title'))
            <span class="help-block text-danger">
            <strong>{{ $errors->first('title') }}</strong>
        </span><br>
        @endif
        <small>Максимальное кол-во знаков: 100</small>
    </div>

    <div class="form-group">
        {{ Form::label('views', 'Просмотры документа') }}
        {{ Form::number('views', old('views'),
                array('class' => 'form-control', 'required'=> true, 'min'=>0, 'step'=>1)) }}
        @if ($errors->has('views'))
            <span class="help-block text-danger">
            <strong>{{ $errors->first('views') }}</strong>
        </span><br>
        @endif
        <small>Количество просмотров документа</small>
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Описание документа') }}
        {{ Form::text('description', old('description'),
            [ 'class' => 'form-control', 'maxlength' => '200']) }}
        @if ($errors->has('description'))
            <span class="help-block text-danger btn-danger">
            <strong>{{ $errors->first('description') }}</strong>
        </span><br>
        @endif
        <small>Максимальное кол-во знаков: 200</small>
    </div>

    @if(isset($instance))

        <div class="form-group">
            {{ Form::label('authorId', 'Сессия загрузившего') }}
            {{ Form::text('authorId', old('authorId'),
                [ 'class' => 'form-control', 'disabled'=>true ]) }}
        </div>

        <div class="form-group">
            {{ Form::label('filename', 'Имя файла') }}
            {{ Form::text('filename', old('filename'),
                [ 'class' => 'form-control', 'disabled'=>true ]) }}
        </div>

        <div class="form-group">
            {{ Form::label('path', 'Путь до файла') }}
            {{ Form::text('path', old('path'),
                [ 'class' => 'form-control', 'disabled'=>true ]) }}
        </div>

    @else

        <div class="form-group">
            <div id="fine-uploader"></div>
        </div>
    @endif

    {{ Form::hidden('uuid', old('uuid'), ['id' => 'uuidInputId']) }}

    <div class="mt-1">
        <div class="form-group">
            <a href="#" class="btn btn-secondary" onclick="window.history.back()">Отменить</a>

            <span class="float-right">
                @if(isset($instance))
                    <button type="reset" class="btn btn-secondary">Сбросить</button>
                @endif
                <button type="submit" id="submit-btn" class="btn btn-primary">Сохранить</button>

            </span>

        </div>
    </div>

</div>
