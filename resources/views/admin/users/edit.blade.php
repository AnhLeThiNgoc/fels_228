@extends('layouts.admin.app')

@section('content')
    <div class="row col-md-6 col-md-offset-3">
        {!! Form::open(['url' => action('Admin\UserController@update', ['user' => $user->id]),
            'method' => 'put',
            'files' => true]) !!}
        <h3> {{ $user->name }}</h3>
        <div>
            <img src="{{ $user->avatarUrl }}" alt="avatar" class="avatar-profile"> {!! Form::file('avatar') !!}
        </div>
        <div class="{!! Form::showErrClass('name') !!}">
            <label>{{ trans('keywords.name') }}</label>
            {!! Form::text('name', $user->name, [
                'class' => 'form-control',
                'id' => 'name',
                'required',
                'autofocus',
            ]) !!}
            {!! Form::showErrField('name') !!}
        </div>
        <div class="{!! Form::showErrClass('password') !!}">
            <label>{{ trans('keywords.password') }}</label>
            {!! Form::password('password', [
                'placeholder' => trans('keywords.unchanged'),
                'class' => 'form-control',
                'id' => 'password',
            ]) !!}
            {!! Form::showErrField('password') !!}
        </div>
        <div class="{!! Form::showErrClass('email') !!}">
            <label>{{ trans('keywords.email') }} </label>
            {!! Form::email('email', $user->email, [
                'class' => 'form-control',
                'id' => 'email',
                'required',
            ]) !!}
            {!! Form::showErrField('email') !!}
        </div>
        <div>
            {!! Form::submit(trans('keywords.save'), ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
