{!! Form::open(['method' => 'DELETE', 'action' => $action]) !!}
    <button class="btn btn-danger btn-delete" type="button" data-message="{{ trans('keywords.confirmDelete') }}">
        {{ trans('keywords.delete')}}
    </button>
{!! Form::close() !!}
