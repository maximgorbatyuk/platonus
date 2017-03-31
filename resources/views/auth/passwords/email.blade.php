@extends('layouts._FrontLayout')

@section('title', 'Восстановление пароля')

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-md-8 offset-2">

            <div class="card">
                <div class="card-block">

                    <h3 class="my-2">Восстановление пароля</h3>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="form-group row ">
                            <div class="col-md-6 offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Выслать письмо для восстановления
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
