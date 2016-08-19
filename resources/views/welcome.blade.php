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
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
          <div class="thumbnail"> <img src="img/400X200.gif" alt="Thumbnail Image 1" class="img-responsive">
            <div class="caption">
              <h3>Heading</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              <hr>
              <p class="text-center"><a href="#" class="btn btn-success" role="button">For Sale</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
          <div class="thumbnail"> <img src="img/400X200.gif" alt="Thumbnail Image 1" class="img-responsive">
            <div class="caption">
              <h3>Heading</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              <hr>
              <p class="text-center"><a href="#" class="btn btn-info" role="button">For Rent</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 hidden-sm hidden-xs">
          <div class="thumbnail"> <img src="img/400X200.gif" alt="Thumbnail Image 1" class="img-responsive">
            <div class="caption">
              <h3>Heading</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              <hr>
              <p class="text-center"><a href="#" class="btn btn-success" role="button">For Sale</a></p>
            </div>
          </div>
        </div>
      </div>
      <hr>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
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
        <div class="col-md-4">
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
        <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Blocks</h3>
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
              </tr>
            </thead>
            <tbody>
              @foreach ($plots as $plot)
                <tr>
                  <td><a href={{ url('/plots/' . $plot->id) }}>{{ $plot->plot_no }}</a></td>
                  <td>{{ $plot->size }}</td>
                  <td>{{ $plot->size }}</td>
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
        <img src="/image.png" alt="..." class="img-responsive">
      </div>
        </div>
    </div>
    <hr>
</div>

@endsection
