@extends('layouts.auth-user')

@section('page_title', 'Complete Registration')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                @include('admin.common.nav_side_menu')
            </div>
            <div class="col-sm-9">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kamilisha Usajili</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-8">
                                @include('common.errors')

                                {!! Form::model($user_detail, ['method' => 'PATCH', 'action' => 'ReservationController@processCompleteRegistration', 'class' => 'form-horizontal', 'files' => true]) !!}

                                @include('reservations.user._form')

                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <button type="submit" class="btn btn-primary btn-block"><i
                                                    class="fa fa-save"></i>
                                            Hifadhi
                                        </button>
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
