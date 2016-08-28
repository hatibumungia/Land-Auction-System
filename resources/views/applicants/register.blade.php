@extends('layouts.app')

@section('page_title', 'Registration')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register</h3>
                    </div>
                    <div class="panel-body">

                        @include('common.errors')

                        {!! Form::open(['url' => '/applicants/auth/register', 'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                            {!! Form::label('first_name', 'First Name', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('middle_name', 'Middle Name', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('middle_name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('last_name', 'Last Name', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('email_address', 'Email', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('email_address', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone_number', 'Phone Number', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Register
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="panel-footer">
                        Already registered? Login <a href="/applicants/login">here</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
