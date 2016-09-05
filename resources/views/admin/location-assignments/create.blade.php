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
				<a href="/admin/location-assignments">Gharama za maeneo</a>
			</li>
			<li class="active">Weka</li>
		</ol>

        <h3>Gharama za maeneo</h3>
    </div>

    <div class="row">

        <div class="well">

            @include('common.errors')

            {!! Form::open(['url' => 'admin/location-assignments', 'class' => 'form-horizontal']) !!}

            @include('admin.location-assignments._form')

            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3">
                    <button type="submit" id="btn-submit" class="btn btn-primary"><i class="fa fa-save"></i> Hifadhi</button>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection