@extends('layouts.app')

@section('page_title', 'Welcome')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs">
        <div id="carousel-299058" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#carousel-299058" data-slide-to="0" class=""> </li>
            <li data-target="#carousel-299058" data-slide-to="1" class="active"> </li>
            <li data-target="#carousel-299058" data-slide-to="2" class=""> </li>
          </ol>
          <div class="carousel-inner">
            <div class="item"> <img class="img-responsive" src="/img/1920x500.gif" alt="thumb">
              <div class="carousel-caption"> Carousel caption. Here goes slide description. Lorem ipsum dolor set amet. </div>
            </div>
            <div class="item active"> <img class="img-responsive" src="/img/1920x500.gif" alt="thumb">
              <div class="carousel-caption"> Carousel caption 2. Here goes slide description. Lorem ipsum dolor set amet. </div>
            </div>
            <div class="item"> <img class="img-responsive" src="/img/1920x500.gif" alt="thumb">
              <div class="carousel-caption"> Carousel caption 3. Here goes slide description. Lorem ipsum dolor set amet. </div>
            </div>
          </div>
          <a class="left carousel-control" href="#carousel-299058" data-slide="prev"><span class="icon-prev"></span></a> <a class="right carousel-control" href="#carousel-299058" data-slide="next"><span class="icon-next"></span></a></div>
      </div>
    </div>
    <hr>
    <section>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <div class="media-object-default">
          <div class="media">
            <div class="media-left"> <a href="#"> <img class="media-object img-circle" src="/img/100X100.gif" alt="placeholder image"> </a> </div>
            <div class="media-body">
              <h4 class="media-heading">DG Meessage</h4>
              Put here</div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <div class="media">
          <div class="media-left"> <a href="#"> <img class="media-object img-circle" src="/img/100X100.gif" alt="placeholder image"></a></div>
          <div class="media-body">
            <h4 class="media-heading">DED Message</h4>
            Put here</div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6 hidden-sm hidden-xs">
        <div class="media">
          <div class="media-left"> <a href="#"> <img class="media-object img-circle" src="/img/100X100.gif" alt="placeholder image"></a></div>
          <div class="media-body">
            <h4 class="media-heading">Instructions</h4>
            Put  here</div>
        </div>
      </div>
    </div>
  </div>
</section>
<hr>
<div class="container">
  <div class="row">
    <div class="col-lg-9 col-md-12">

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


    </div>
    <div class="col-lg-3 col-md-6 col-md-offset-3 col-lg-offset-0">
      <div class="well">
        <h3 class="text-center">Find Your Plot</h3>
        <form class="form-horizontal">
          <div class="form-group">
            <label for="location1" class="control-label">Area</label>
            <select class="form-control" name="" id="location1">
              <option value="">Any</option>
              <option value="">Kisasa</option>
              <option value="">Ilazo</option>
              <option value="">Iyumbu</option>
              <option value="">Mkalama</option>
              <option value="">Ntyuka</option>
            </select>
          </div>
          <div class="form-group">
            <label for="type1" class="control-label">Type</label>
            <select class="form-control" name="" id="type1">
              <option value="">Any</option>
              <option value="">Residential</option>
              <option value="">Institution</option>
              <option value="">Commercial</option>
              <option value="">Residential & Commercial</option>
              <option value="">Ntyuka</option>
            </select>
          </div>
          <div class="form-group">
            <label for="pricefrom" class="control-label">Size From</label>
            <div class="input-group">
              <div class="input-group-addon">Sqrm</div>
              <input type="text" class="form-control" id="pricefrom">
            </div>
          </div>
          <div class="form-group">
            <label for="priceto" class="control-label">Size To</label>
            <div class="input-group">
              <div class="input-group-addon">Sqrm</div>
              <input type="text" class="form-control" id="priceto">
            </div>
          </div>
          <p class="text-center"><a href="#" class="btn btn-danger" role="button">Search </a></p>
        </form>
      </div>
      <hr>
      <h3 class="text-center">Inquries</h3>
      <div class="media-object-default">
        <div class="media">
          <div class="media-left"> <a href="#"> <img class="media-object img-rounded" src="/img/64X64.gif" alt="placeholder image"> </a> </div>
          <div class="media-body">
            <h4 class="media-heading">Alfred Rutae</h4>
            <abbr title="Phone">P:</abbr> 0713882972   <a href="mailto:#">ruta@cda.go.tz</a> </div>
        </div>
        <div class="media">
          <div class="media-left"> <a href="#"> <img class="media-object img-rounded" src="/img/64X64.gif" alt="placeholder image"> </a> </div>
          <div class="media-body">
            <h4 class="media-heading">Emmanuela Masawika</h4>
            <abbr title="Phone">P:</abbr> 0766242974   <a href="mailto:#">masawika@cda.go.tz</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>

    <hr>
  </div>

@endsection
