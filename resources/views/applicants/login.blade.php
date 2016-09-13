@extends('layouts.app')

@section('page_title', 'Login')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingia</h3>
                    </div>
                    <div class="panel-body">

                        @include('common.errors')

                        {!! Form::open(['url' => '/applicants/auth/login']) !!}
                        <div class="form-group">
                            {!! Form::label('username', 'Namba ya Simu') !!}
                            {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => '+255719961077']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Neno la Siri') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Ingia</button>
                        {!! Form::close() !!}
                    </div>
                    <div class="panel-footer">
                       Hujajisajili?  Jisajili <a href="/applicants/register"> hapa </a>.
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
