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
                <a href="/admin/land-uses">Matumizi ya ardhi</a>
            </li>
            <li class="active">Add</li>
        </ol>

    <h3>Add land use</h3>

    <div class="well">

        @include('common.errors')

        {!! Form::open(['url' => 'admin/land-uses', 'class' => 'form-horizontal']) !!}

        @include('admin.land-uses._form')

        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Hifadhi</button>
            </div>
        </div>

        {!! Form::close() !!}

    </div>

</div>

@endsection