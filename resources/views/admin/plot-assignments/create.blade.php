@extends('layouts.admin')

@section('page_title' , ' - Admin')

@section('nav_bar')

    @include('admin.common.nav_bar')

@endsection

@section('side_bar')

    @include('admin.common.nav_side_menu')

@endsection

@section('main_content')

    <h3 class="text-center">Plot Assignment</h3>

    <div class="well">

        @include('common.errors')

        {!! Form::open(['url' => 'admin/plot-assignments', 'class' => 'form-horizontal', 'files' => true]) !!}

        @include('admin.plot-assignments._form')

        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            </div>
        </div>

        {!! Form::close() !!}

    </div>

@endsection