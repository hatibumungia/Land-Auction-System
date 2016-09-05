@extends('layouts.admin')

@section('page_title' , ' - Admin')

@section('nav_bar')

	@include('admin.common.nav_bar')

@endsection

@section('side_bar')

	@include('admin.common.nav_side_menu')

@endsection

@section('main_content')

	<h2>{{ $block->name }}</h2>

	<a class="btn btn-danger btn-lg" data-toggle="modal" href='#{{ $block->block_id }}'><i class="fa fa-trash"></i> Delete</a>
	<div class="modal fade" id="{{ $block->block_id }}">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Deleting {{ $block->name }}</h4>
				</div>
				<div class="modal-body">

					<p class="lead">Je, una uhakika kwamba unataka kufuta <strong>{{ $block->name }}</strong> ?</p>

				</div>
				<div class="modal-footer">

					{!! Form::open(['method' => 'DELETE', 'route' => ['admin.blocks.destroy', $block->block_id]]) !!}
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>

@endsection