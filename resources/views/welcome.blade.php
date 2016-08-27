@extends('layouts.app')

@section('page_title', 'Welcome')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Location</h3>
        </div>
        <ul id="areaListView" class="list-group">
          @foreach($areas as $area)
            <li class="list-group-item" data-area-id="{{ $area->area_id }}">{{ $area->name }}</li>
          @endforeach
        </ul>
      </div>
        </div>
        <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Land Use</h3>
        </div>
        <ul id="areaTypeListView" class="list-group">
          <li class="list-group-item">...</li>
          @foreach($area_types as $area_type)
            <li class="list-group-item" data-area-type-id="{{ $area_type->areas_type_id }}">{{ $area_type->name }}</li>
          @endforeach
        </ul>
      </div>
        </div>
        <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Block</h3>
        </div>
        <ul id="blockListView" class="list-group">
          <li class="list-group-item">...</li>
          @foreach($blocks as $block)
            <li class="list-group-item" data-block-id="{{ $block->block_id }}">{{ $block->name }}</li>
          @endforeach
        </ul>
      </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
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
                <th><i class="fa fa-sign-out"></i></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($plots as $plot)
                <tr>
                  <td><a href={{ url('/plots/' . $plot->id) }}>{{ $plot->plot_no }}</a></td>
                  <td>{{ $plot->size }}</td>
                  <td>{{ $plot->size }}</td>
                  <td>
                  	
<!-- Modal for reservation -->

<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a>
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>


<!-- //Modal for reservation -->


                  </td>
                </tr>
              @endforeach
            </tbody>

          </table>
        </ul>
      </div>
        </div>
        <div class="col-md-4">
      <div id="sitePlanPanel" class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Siteplan</h3>
        </div>
        <div id="site-plan"></div>
      </div>
        </div>
    </div>
</div>

@endsection
