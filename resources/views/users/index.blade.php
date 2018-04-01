@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if(Session::has('success_message'))
                        <div class="alert alert-success">
                            <span class="glyphicon glyphicon-ok"></span>
                            {!! session('success_message') !!}

                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                    @endif

                    <div class="card-header bg-transparent text-center">
                        <h4 class="mt-5 mb-5">{{ trans('users.model_plural') }}</h4>
                        <a href="{{ route('users.user.create') }}" class="btn btn-success" title="{{ trans('users.create') }}">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true">Back to Index</span>
                        </a>
                    </div>
                    
                    <div class="card-body">
                        @if(count($users) == 0)
                            <div class="text-center">
                                <h4>{{ trans('users.none_available') }}</h4>
                            </div>
                        @else
                    </div>

                    <div class="table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ trans('users.name') }}</th>
                            <th>{{ trans('users.email') }}</th>
                            <th>{{ trans('users.password') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>

                            <td>

                                <form method="POST" action="{!! route('users.user.destroy', $user->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('users.user.show', $user->id ) }}" class="btn btn-info" title="{{ trans('users.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">Show</span>
                                        </a>
                                        <a href="{{ route('users.user.edit', $user->id ) }}" class="btn btn-primary" title="{{ trans('users.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('users.delete') }}" onclick="return confirm(&quot;{{ trans('users.confirm_delete') }}&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
                </div>
                
            </div>
            
        </div>
    </div>

    

    

        <div class="panel-footer">
            {!! $users->render() !!}
        </div>
        
        @endif
    
@endsection