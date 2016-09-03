@extends('layouts.app')

@section('page_title', 'Complete Registration')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            @include('reservations.common.sidebar')
        </div>        
        <div class="col-sm-9">
            <h3>Complete your registration</h3>

             @include('common.errors')

            {!! Form::model($user_detail, ['method' => 'PATCH', 'action' => 'ReservationController@processCompleteRegistration', 'class' => 'form-horizontal', 'files' => true]) !!}

                @include('reservations.user._form')

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
