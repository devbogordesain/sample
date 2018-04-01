@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-transparent text-center">
                    <h4 class="mt-5 mb-5">{{ !empty($user->name) ? $user->name : 'User' }}</h4>
                    <a href="{{ route('users.user.index') }}" class="btn btn-primary" title="{{ trans('users.show_all') }}">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">Show All User</span>
                </a>

                <a href="{{ route('users.user.create') }}" class="btn btn-success" title="{{ trans('users.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Create User</span>
                </a>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form method="POST" action="{{ route('users.user.update', $user->id) }}" id="edit_user_form" name="edit_user_form" accept-charset="UTF-8" class="form-horizontal">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    @include ('users.form', [
                                                'user' => $user,
                                              ])

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <input class="btn btn-primary" type="submit" value="{{ trans('users.update') }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>

    

@endsection