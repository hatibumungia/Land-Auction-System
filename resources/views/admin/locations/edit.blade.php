@extends('layouts.admin')

@section('page_title' , ' - Admin')

@section('nav_bar')

    @include('admin.common.nav_bar')

@endsection

@section('side_bar')

    @include('admin.common.nav_side_menu')

@endsection

@section('main_content')

<div class="row">
    
        <ol class="breadcrumb">
            <li>
                <a href="/admin/dashboard">Home</a>
            </li>
            <li>
                <a href="/admin/locations">Locations</a>
            </li>
            <li>
                <a href="/admin/locations/{{ $location->area_id }}">{{ $location->name }}</a>
            </li>            
            <li class="active">Edit</li>
        </ol>

    <h3>Edit {{ $location->name }}</h3>

    <div class="well">

        @include('common.errors')

        {!! Form::model($location, ['method' => 'PATCH', 'action' => ['Admin\AreaController@update', $location->area_id] , 'class' => 'form-horizontal']) !!}

        @include('admin.locations._form')

        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
            </div>
        </div>

        {!! Form::close() !!}

    </div>

</div>


@endsection