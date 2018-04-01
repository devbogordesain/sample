@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-transparent text-center">
                        <span class="pull-left">
                            <h4 class="mt-5 mb-5">{{ trans('users.create') }}</h4>
                            
                                <a href="{{ route('users.user.index') }}" class="btn btn-primary" title="{{ trans('users.show_all') }}">
                                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">Back to Index</span>
                                </a>
                            
                        </span>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('users.user.store') }}" accept-charset="UTF-8" id="create_user_form" name="create_user_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('users.form', [
                                        'user' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('users.add') }}">
                    </div>
                </div>

            </form>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    


    

@endsection


