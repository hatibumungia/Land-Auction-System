@extends('layouts.app')

@section('page_title', 'Search')

@section('content')


<div class="container">
    <hr>
  <div class="row">
    <div class="col-lg-9 col-md-12">

    <div class="row">
        <div class="col-md-12">



<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Search Results</h3>
  </div>
  <div class="panel-body">
    <div id="searchResults">

<!--       <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
</table> -->

  </div>


</div>
</div>
          

          

{{--			<div id="plotPanel2" class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Plots</h3>
				</div>
				<ul class="list-group">
					<table id="plotDataTable" class="table table-hover display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Area</th>
								<th>Type</th>
								<th>Block</th>
								<th>Plot#</th>
								<th>Size</th>
								<th>Price (TZS)</th>
							</tr>
						</thead>
						<tbody>

						</tbody>

					</table>
				</ul>
			</div>

            --}}
          

        </div>
    </div>


    </div>

   <div class="col-lg-3 col-md-6 col-md-offset-3 col-lg-offset-0">
  <div class="alert alert-info">
    <h3 class="text-center">Find Your Plot</h3>
    <form class="form-horizontal">
      <div class="form-group">
        <label for="area_id" class="control-label">Area</label>
        <select class="form-control" name="area_id" id="area_id">
          <option class="list-group-item" value="0">Any</option>
          @foreach($areas as $area)
						<option class="list-group-item" value="{{ $area->area_id }}">{{ $area->name }}</<option>
			  @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="area_type_id" class="control-label">Area Type</label>
        <select class="form-control" name="area_type_id" id="area_type_id">
          <option class="list-group-item" value="0">Any</option>
          @foreach($area_types as $area_type)
						<option value="{{ $area_type->areas_type_id }}">{{ $area_type->name }}</option>	
			  @endforeach
  
        </select>
      </div>
{{--      <div class="form-group">
        <label for="min_size" class="control-label">Min Size</label>
        <div class="input-group">
          <input type="text" class="form-control" id="min_size">
          <div class="input-group-addon">Sqrm</div>
        </div>
      </div>
      <div class="form-group">
        <label for="max_size" class="control-label">Max Size</label>
        <div class="input-group">
          <input type="text" class="form-control" id="max_size">
          <div class="input-group-addon">Sqrm</div>
        </div>
      </div>--}}
      <p class="text-center"><button type="button" id="btn-search" class="btn btn-primary btn-block">Search</button> </p>
    </form>
    <br><br><br><br>
  </div>
  <hr>
</div>
    </div>
  </div>
</div>
<hr>


@endsection
