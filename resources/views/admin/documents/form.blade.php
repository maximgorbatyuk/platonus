
<div class="mt-1">
    <div class="form-group">
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
        {{ Form::label('description', 'Описание документа') }}
        {{ Form::textarea('description', old('description'),
                array('class' => 'form-control', 'required'=> true, 'maxlength' => '400',
                'placeholder' => 'Описание документа будет доступно публично всем пользователям. Отнеситесь, пожалуйста, ответственно')) }}
        @if ($errors->has('description'))
            <span class="help-block text-danger">
            <strong>{{ $errors->first('description') }}</strong>
        </span><br>
        @endif
        <small>Максимальное кол-во знаков: 400</small>
    </div>

    <div class="form-group">
        <div id="fine-uploader"></div>
    </div>

    <div class="mt-1">
        <div class="form-group">
            <button type="submit" id="submit-btn" class="btn btn-primary mb-1">Загрузить</button>
            <a href="#" class="btn btn-link" onclick="window.history.back()">Отменить</a>
        </div>
    </div>

</div>
