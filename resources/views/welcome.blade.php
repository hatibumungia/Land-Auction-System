@extends('layouts.app')

@section('page_title', 'Welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Area</h3>
				</div>
				<ul class="list-group">
					@foreach($areas as $area)
						<li class="list-group-item">
							<a href="#" data-id="{{ $area->id }}">{{ $area->name }}</a>
						</li>
					@endforeach
				</ul>
			</div>
        </div>
        <div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Area Type</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item">Cras justo odio</li>
					<li class="list-group-item">Dapibus ac facilisis in</li>
					<li class="list-group-item">Morbi leo risus</li>
					<li class="list-group-item">Porta ac consectetur ac</li>
					<li class="list-group-item">Vestibulum at eros</li>
				</ul>
			</div>
        </div>
        <div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Blocks</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item">Cras justo odio</li>
					<li class="list-group-item">Dapibus ac facilisis in</li>
					<li class="list-group-item">Morbi leo risus</li>
					<li class="list-group-item">Porta ac consectetur ac</li>
					<li class="list-group-item">Vestibulum at eros</li>
				</ul>
			</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Plots</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item">Cras justo odio</li>
					<li class="list-group-item">Dapibus ac facilisis in</li>
					<li class="list-group-item">Morbi leo risus</li>
					<li class="list-group-item">Porta ac consectetur ac</li>
					<li class="list-group-item">Vestibulum at eros</li>
				</ul>
			</div>
        </div>
        <div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Siteplan</h3>
				</div>
				<img src="http://placehold.it/1024x720" alt="..." class="img-responsive">
			</div>
        </div>
    </div>
</div>
@endsection
