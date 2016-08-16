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
				<ul id="areaListView" class="list-group">
					@foreach($areas as $area)
						<li class="list-group-item" data-id="{{ $area->id }}">{{ $area->name }}</li>
					@endforeach
				</ul>
			</div>
        </div>
        <div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Area Type</h3>
				</div>
				<ul id="areaTypeListView" class="list-group">
					<li class="list-group-item">...</li>
					@foreach($area_types as $area_type)
						<li class="list-group-item" data-id="{{ $area_type->id }}">{{ $area_type->name }}</li>
					@endforeach
				</ul>
			</div>
        </div>
        <div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Blocks</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item">...</li>
					@foreach($blocks as $block)
						<li class="list-group-item" data-id="{{ $block->id }}">{{ $block->name }}</li>
					@endforeach
				</ul>
			</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Plots</h3>
				</div>
				<ul class="list-group">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Plot #</th>
								<th>Size (sq. m)</th>
								<th>Price (TZS)</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($plots as $plot)
								<tr>
									<td><a href={{ url('/plots/' . $plot->id) }}>{{ $plot->plot_no }}</a></td>
									<td>{{ $plot->size }}</td>
									<td>{{ $plot->price }}</td>
								</tr>
							@endforeach
						</tbody>

					</table>
				</ul>
			</div>
        </div>
        <div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Siteplan</h3>
				</div>
				<img src="" alt="..." class="img-responsive">
			</div>
        </div>
    </div>
</div>
@endsection
