@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    {{ trans('keywords.new', ['item' => trans_choice('keywords.categories', 1)]) }}
                </div>
                <div class="panel-body">
                    {!! Form::open([
                        'method' => 'POST',
                        'action' => 'Admin\CategoryController@store',
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

                        <div class="{!! Form::showErrClass('description') !!}">
                            {!! Form::label('description', trans('keywords.description'), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('description', null, [
                                    'class' => 'form-control',
                                    'id' => 'description',
                                    'required',
                                    'autofocus',
                                ]) !!}
                                {!! Form::showErrField('description') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <div class="btn-group">
                                    {!! Form::submit(trans('keywords.create'), ['class' => 'btn btn-success']) !!}
                                    <a class="btn btn-primary pull-right"
                                        href="{{ action('Admin\CategoryController@index') }}">{{ trans('keywords.cancel') }}
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
