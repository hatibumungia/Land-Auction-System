@extends('layouts.app')

@section('page_title')

{{ $location->name }}

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
				<li class="active">{{ $location->name }}</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12">

		<h2>{{ $location->name }}</h2>

		<a class="btn btn-danger btn-lg" data-toggle="modal" href='#{{ $location->area_id }}'><i class="fa fa-trash"></i> Delete</a>
		<div class="modal fade" id="{{ $location->area_id }}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Deleting {{ $location->name }}</h4>
					</div>
					<div class="modal-body">

						<p class="lead">Are you sure that you want to delete <strong>{{ $location->name }}</strong> ?</p>
						
					</div>
					<div class="modal-footer">

                        {!! Form::open(['method' => 'DELETE', 'route' => ['locations.destroy', $location->area_id]]) !!}
                        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        {!! Form::close() !!}

					</div>
				</div>
			</div>
		</div>		
		
		</div>
	</div>
</div>

@endsection