index user admin 

@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="panel panel-info">
                    <div class="panel-heading clearfix">
                        <div class="panel-title pull-left">
                            {{ trans_choice('keywords.users', $count) }} : {{ $count }}
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary"
                               href="{{ action('Admin\UserController@create') }}">{{ trans('keywords.add') }}</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if ($users->count() != 0)
                            <table class="table table-hover table-bordered text-center">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->id }}
                                        </td>
                                        <td>
                                            <a href="{{ action('Admin\UserController@show', [
                                                'user' => $user->id]) }}">{{ $user->name }}</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-warning"
                                               href="{{ action('Admin\UserController@edit', ['user' => $user->id]) }}">
                                                {{ trans('keywords.edit') }}
                                            </a>
                                        </td>
                                        <td>
                                            @include('layouts.admin.includes._delete', [
                                                'action' => ['Admin\UserController@destroy', 'user' => $user->id],
                                            ])
                                        </td>
                                    </tr>
                                    @endforeach
                            </table>
                        @else
                            {{ trans('messages.empty', ['item' => trans_choice('messages.users', 1)]) }}
                        @endif
                    </div>
                    <div class="panel-footer">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {!! Html::script(elixir('js/form-delete.js')) !!}
@endsection
