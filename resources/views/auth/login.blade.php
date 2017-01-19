@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('keywords.login') }}</div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'POST',
                        'action' => 'Auth\LoginController@login',
                        'class' => 'form-horizontal',
                        'role' => 'form',
                    ]) !!}

                    <div class="{!! Form::showErrClass('email') !!}">
                        {!! Form::label('email', trans('keywords.email'), ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::email('email', old('email'), [
                                'class' => 'form-control',
                                'id' => 'email',
                                'required',
                                'autofocus',
                            ]) !!}
                            {!! Form::showErrField('email') !!}
                        </div>
                    </div>

                    <div class="{!! Form::showErrClass('password') !!}">
                        {!! Form::label('password', trans('keywords.password'),
                        ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::password('password', [
                                'class' => 'form-control',
                                'id' => 'password',
                                'required',
                            ]) !!}
                            {!! Form::showErrField('password') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('remember') !!} {{ trans('keywords.remember_me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            {!! Form::submit(trans('keywords.login'), ['class' => 'btn btn-primary']) !!}

                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                {{ trans('keywords.forgot_password') }}
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
