@extends('layouts.app')

@section('page_title', 'Login')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['url' => '/applicants/index']) !!}
                        <div class="form-group">
                            {!! Form::label('phone', 'Phone Number') !!}
                            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '+255719961077']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button>
                        {!! Form::close() !!}
                    </div>
                    <div class="panel-footer">
                        Not registered? Register <a href="/applicants/register">here</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
