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
			<a href="/admin/dashboard">Nyumbani</a>
		</li>
		<li>
			<a href="/admin/block-assignments">Ramani za vitalu</a>
		</li>
		<li class="active">Pakia</li>
	</ol>

    <h3>Pakia ramani za vitalu</h3>

    <div class="well">

        @include('common.errors')

        {!! Form::open(['url' => 'admin/block-assignments', 'class' => 'form-horizontal', 'files' => true]) !!}

        @include('admin.block-assignments._form')

        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <button type="submit" id="btn-submit" class="btn btn-primary"><i class="fa fa-save"></i> Hifadhi</button>
            </div>
        </div>

        {!! Form::close() !!}

    </div>
	
</div>

@endsection