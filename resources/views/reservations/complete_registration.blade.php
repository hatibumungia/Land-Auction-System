@extends('layouts.admin')

@section('page_title', 'Admin')

@section('nav_bar')

    @include('admin.common.nav_bar')

@endsection

@section('side_bar')

    @include('admin.common.nav_side_menu')

@endsection

@section('main_content')

    <div class="row">
        <div class="col-xs-12">
            <h2>Kamilisha Usajili</h2>
            <a href="{{ url('/') }}" class="btn btn-primary pull-right">Ongeza kiwanja kingine</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                @if(Session::has('plot_status'))
                    <div class="alert alert-info">

                        <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">&times;</button>

                        <p class="lead">{{ Session::get('plot_status') }}</p>
                    </div>
                @endif
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">#</h3>
                </div>
                <div class="panel-body">


                    @include('common.errors')

                    {!! Form::model($user_detail, ['method' => 'PATCH', 'action' => 'ReservationController@processCompleteRegistration', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include('reservations.user._form')

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary"><i
                                        class="fa fa-save"></i>
                                Hifadhi
                            </button>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
                <div class="panel-footer">

                </div>
            </div>
        </div>

    </div>

@endsection
