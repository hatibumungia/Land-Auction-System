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
                            <li class="list-group-item"
                                data-area-type-id="{{ $area_type->areas_type_id }}">{{ $area_type->name }}</li>
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
                <div id="plotPanel" class="panel panel-default"></div>
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
    </div>

@endsection
