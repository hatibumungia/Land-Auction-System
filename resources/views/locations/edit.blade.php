@extends('layouts.app')

@section('page_title')

Edit {{ $location->name }}

@endsection

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<ol class="breadcrumb">
				<li>
					<a href="/">Home</a>
				</li>
				<li>
					<a href="/locations">Locations</a>
				</li>
				<li>
					<a href="/locations/{{ $location->area_id }}">{{ $location->name }}</a>
				</li>								
				<li class="active">Edit</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3">
			<h3>Edit {{ $location->name }}</h3>
				
			<div class="well">

				@include('common.errors')
				
				{!! Form::model($location, ['method' => 'PATCH', 'action' => ['AreaController@update', $location->area_id] , 'class' => 'form-horizontal']) !!}

					@include('locations._form')

					<div class="form-group">
						<div class="col-sm-9 col-sm-offset-3">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
						</div>
					</div>

				{!! Form::close() !!}

			</div>

		</div>
	</div>
</div>

@endsection