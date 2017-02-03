@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        {{ trans('keywords.new', ['item' => trans_choice('keywords.users', 1)]) }}
                    </div>
                    <div class="panel-body">
                        {!! Form::open([
                            'method' => 'POST',
                            'action' => 'Admin\UserController@store',
                            'class' => 'form-horizontal',
                        ]) !!}

                        <div class="{!! Form::showErrClass('name') !!}">
                            {!! Form::label('name', trans('keywords.name'), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', null, [
                                    'class' => 'form-control',
                                    'id' => 'name',
                                    'required',
                                    'autofocus',
                                ]) !!}
                                {!! Form::showErrField('name') !!}
                            </div>
                        </div>

                        <div class="{!! Form::showErrClass('email') !!}">
                            {!! Form::label('email', trans('keywords.email'), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('email', null, [
                                    'class' => 'form-control',
                                    'id' => 'email',
                                    'required',
                                    'autofocus',
                                ]) !!}
                                {!! Form::showErrField('email') !!}
                            </div>
                        </div>

                        <div class="{!! Form::showErrClass('password') !!}">
                            {!! Form::label('password', trans('keywords.password'), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password', [
                                    'class' => 'form-control',
                                    'id' => 'password',
                                    'required',
                                    'autofocus',
                                ]) !!}
                                {!! Form::showErrField('password') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <div class="btn-group">
                                    {!! Form::submit(trans('keywords.create'), ['class' => 'btn btn-success']) !!}
                                    <a class="btn btn-primary pull-right"
                                       href="{{ action('Admin\UserController@index') }}">@lang('keywords.cancel')
                                    </a>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
