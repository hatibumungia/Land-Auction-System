@extends('layouts.admin')

@section('page_title', 'Change Password')

@section('nav_bar')

    @include('admin.common.nav_bar')

@endsection

@section('side_bar')

    @include('admin.common.nav_side_menu')

@endsection

@section('main_content')

    <div class="row">
        <div class="col-xs-12">
            <h2>Badilisha neno la siri</h2>
            <a href="{{ url('/reservation') }}" class="btn btn-primary pull-right">Return home</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">#</h3>
                </div>
                <div class="panel-body">
                    <br><br>

                    <div style="padding: 0 30px 0 30px;">
                        @include('errors.list')
                    </div>

                    {!! Form::open(['action' => 'AccountController@process_change_password', 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('old_password', 'Neno la siri la zamani', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-3">
                            {!! Form::password('old_password', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Neno la siri jipya', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-3">
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Neno la siri jipya tena', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-3">
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-sm-offset-2">
                            {!! Form::submit('Badilisha', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
                <div class="panel-footer">
                    <strong>#</strong>
                </div>
            </div>
        </div>
    </div>

@endsection