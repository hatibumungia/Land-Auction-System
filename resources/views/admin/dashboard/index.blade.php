@extends('layouts.admin')

@section('page_title', 'Admin')

@section('nav_bar')

    @include('admin.common.nav_bar')

@endsection

@section('side_bar')

    @include('admin.common.nav_side_menu')

@endsection

@section('main_content')

    <div class="row">
        <div class="col-xs-12">
            <h2>Overview</h2>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Summary</h3>
                </div>
                <div class="panel-body">
                    <div class="row" style="padding: 2.5em;">
                        @foreach($all_plots as $plot)
                            <div class="col-sm-3 text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <h1>{{ $plot->areaname }}</h1>
                                        <h2>{{ $plot->total_plots }} Plots</h2>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> 
                    <hr>               
                    <div class="row" style="padding: 2.5em;">
                        <div class="col-sm-3 text-center">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <h1>{{ $total_areas }} </h1>
                                    <h3>Areas</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 text-center">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <h1>{{ $total_land_uses }} </h1>
                                    <h3>Land uses</h3>
                                </div>    
                            </div>
                        </div>
                        <div class="col-sm-3 text-center">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <h1>{{ $total_blocks }} </h1>
                                    <h3>Blocks</h3>
                                </div>    
                            </div>
                        </div>
                        <div class="col-sm-3 text-center">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <h1>{{ $total_plots }} </h1>
                                    <h3>Plots</h3>
                                </div>    
                            </div>
                        </div>                                                                        
                    </div>
                </div>
                <div class="panel-footer">
                    
                </div>
            </div>
        </div>
    </div>

@endsection