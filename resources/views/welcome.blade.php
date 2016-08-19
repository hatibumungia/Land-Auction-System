@extends('layouts.app')

@section('page_title', 'Welcome')

@section('content')
<div class="container">
	<div style="padding-left: 5px;padding-right: 5px;padding-top: 20px;padding-bottom: 20px ">
		<h1>Welcome</h1>

		<p>This is the skeleton system of CDA plot acquisition system for cda dodoma. feel free to contribute.</p>

	</div>
    <div class="row">
        <div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Area</h3>
				</div>
				<ul id="areaListView" class="list-group">
					@foreach($areas as $area)
						<li class="list-group-item" data-area-id="{{ $area->area_id }}">{{ $area->name }}</li>
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
						<li class="list-group-item" data-area-type-id="{{ $area_type->areas_type_id }}">{{ $area_type->name }}</li>
					@endforeach
				</ul>
			</div>
        </div>
        <div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Blocks</h3>
				</div>
				<ul id="blockListView" class="list-group">
					<li class="list-group-item">...</li>
					@foreach($blocks as $block)
						<li class="list-group-item" data-id="{{ $block->id }}">{{ $block->name }}</li>
					@endforeach
				</ul>
			</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
			<div id="plotPanel" class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Plots</h3>
				</div>
				<ul class="list-group">
					<table id="plotDataTable" class="table table-hover display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Plot #</th>
								<th>Size (sq. m)</th>
								<th>Price (TZS)</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($plots as $plot)
								<tr>
									<td><a href={{ url('/plots/' . $plot->id) }}>{{ $plot->plot_no }}</a></td>
									<td>{{ $plot->size }}</td>
									<td>{{ $plot->price }}</td>
									<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#researvationModal">Reserve</button>
									</td>
								</tr>
							@endforeach
						</tbody>

					</table>
				</ul>
			</div>
        </div>
        <div class="col-md-3">
			<div id="sitePlanPanel" class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Siteplan</h3>
				</div>
				<img src="/image.png" alt="..." class="img-responsive">
			</div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="researvationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Sign In/Register</h4>
      </div>
      <div class="modal-body">
        
      	@if (Auth::guest())
      		User is not logged in
      	@else
      		User is logged in
      	@endif

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
