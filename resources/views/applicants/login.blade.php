@extends('layouts.app')

@section('page_title', 'Login')

@section('content')

    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-sm-offset-4">

                    <h1 class="text-center">Login</h1>

                    @include('common.errors')

                    {!! Form::open(['url' => '/applicants/auth/login']) !!}
                    <div class="form-group">
                        {!! Form::label('username', 'Namba ya Simu') !!}
                        {!! Form::text('username', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Neno la Siri') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
