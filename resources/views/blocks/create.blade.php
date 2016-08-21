@extends('layouts.app')

@section('page_title', 'Add a Block')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<ol class="breadcrumb">
				<li>
					<a href="/">Home</a>
				</li>
				<li>
					<a href="/blocks">Blocks</a>
				</li>				
				<li class="active">Add</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3">
			<h3>Add a block</h3>
				
			<div class="well">

				@include('common.errors')
				
				{!! Form::open(['url' => 'blocks', 'class' => 'form-horizontal']) !!}

					@include('blocks._form')

					<div class="form-group">
						<div class="col-sm-9 col-sm-offset-3">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
						</div>
					</div>

				{!! Form::close() !!}

			</div>

		</div>
	</div>
</div>

@endsection