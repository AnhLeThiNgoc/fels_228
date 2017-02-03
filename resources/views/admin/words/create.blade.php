@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        {{ trans('keywords.new', ['item' => trans_choice('keywords.words', 1)]) }}
                    </div>
                    <div class="panel-body">
                        {!! Form::open([
                            'method' => 'POST',
                            'action' => ['Admin\WordController@store'],
                            'class' => 'form-horizontal',
                        ]) !!}
                        <div class="{!! Form::showErrClass('word') !!}">
                            {!! Form::label('word', trans_choice('keywords.words', 1), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('word', null, [
                                    'class' => 'form-control has-feedback form-group has-feedback-right list-group-item',
                                    'id' => 'word',
                                    'required',
                                    'autofocus',
                                ]) !!}
                                {!! Form::showErrField('word') !!}
                            </div>
                        </div>
                        <div class="{!! Form::showErrClass('category_id') !!}">
                            {!! Form::label('category', trans_choice('keywords.categories', 1), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('category', $categoriesCollection, null, [
                                    'class' => 'has-feedback form-group has-feedback-right list-group-item']) !!}
                                {!! Form::showErrField('category') !!}
                            </div>
                        </div>
                        <div class="{!! Form::showErrClass('answers') !!}">
                            {!! Form::label('answers', trans_choice('keywords.meanings', 1), ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                @for ($i = 0; $i <4; $i++)
                                <div class="has-feedback form-group has-feedback-right list-group-item">
                                    {!! Form::text('answers[' . $i .']', null, [
                                        'class' => 'form-control',
                                        'required',
                                        'autofocus',
                                    ]) !!}
                                </div>
                                @endfor
                                {!! Form::showErrField('answers') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <div class="btn-group">
                                    {!! Form::submit(trans('keywords.save'), ['class' => 'btn btn-success']) !!}
                                    <a class="btn btn-primary pull-right"
                                       href="{{ action('Admin\WordController@index') }}">{{ trans('keywords.cancel') }}
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
