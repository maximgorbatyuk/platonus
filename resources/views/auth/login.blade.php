@extends('layouts._FrontLayout')

@section('title', 'Авторизация')

@section('content')
<div class="container my-3">
    <div class="row">
        <div class="col-md-8 offset-2">

            <div class="card">
                <div class="card-block">

                    <h3 class="my-2">Авторизация</h3>

                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">

                            {{ Form::label('email', 'Email адрес', ['class' => 'col-4 col-form-label']) }}
                            <div class="col-md-6">

                                {{ Form::email('email', old('email'), [
                                    'class'=>'form-control', 'required'=>true,'autofocus'=>true
                                ]) }}

                                @if ($errors->has('email'))
                                    <span class="form-control-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
                            {{ Form::label('password', 'Пароль', ['class' => 'col-4 col-form-label']) }}

                            <div class="col-md-6">
                                {{ Form::password('password', [
                                    'class'=>'form-control', 'required'=>true
                                ]) }}

                                @if ($errors->has('password'))
                                    <span class="form-control-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-4 form-check">
                                <div class="form-check-label">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} title="Запомнить">
                                    Запомнить
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Логин
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Забыли Ваш пароль?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
