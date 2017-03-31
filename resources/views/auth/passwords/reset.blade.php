@extends('layouts._FrontLayout')

@section('title', 'Восстановление пароля')

@section('content')
<div class="container my-3">
    <div class="row">
        <div class="col-md-8 offset-2">

            <div class="card">
                <div class="card-block">
                    <h3 class="my-2">Восстановление пароля</h3>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

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

                        <div class="form-group row {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Подтвердите пароль</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Сбросить пароль
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </div>
</div>
@endsection
