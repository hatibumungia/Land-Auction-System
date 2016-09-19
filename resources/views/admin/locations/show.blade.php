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
            <h2>{{ $location->name }}</h2>
            <a href="{{ url('/admin/locations') }}" class="btn btn-primary pull-right">View All</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">#</h3>
                </div>
                <div class="panel-body">
                    <h2>{{ $location->name }}</h2>
                    <a class="btn btn-danger" data-toggle="modal" href='#{{ $location->area_id }}'><i
                                class="fa fa-trash"></i> Delete</a>
                    <div class="modal fade" id="{{ $location->area_id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Futa {{ $location->name }}</h4>
                                </div>
                                <div class="modal-body">

                                    <p class="lead">Je, una uhakika kwamba unataka kufuta
                                        <strong>{{ $location->name }}</strong> ?
                                    </p>

                                </div>
                                <div class="modal-footer">

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.locations.destroy', $location->area_id]]) !!}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Acha</button>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Futa
                                    </button>
                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection