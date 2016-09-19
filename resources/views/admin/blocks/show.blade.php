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
            <h2>Block</h2>
            <a href="{{ url('/admin/blocks') }}" class="btn btn-primary pull-right">View All</a>
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
                    <h2>{{ $block->name }}</h2>

                    <a class="btn btn-danger" data-toggle="modal" href='#{{ $block->block_id }}'><i
                                class="fa fa-trash"></i> Delete</a>
                    <div class="modal fade" id="{{ $block->block_id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Deleting {{ $block->name }}</h4>
                                </div>
                                <div class="modal-body">

                                    <p class="lead">Je, una uhakika kwamba unataka kufuta
                                        <strong>{{ $block->name }}</strong> ?</p>

                                </div>
                                <div class="modal-footer">

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.blocks.destroy', $block->block_id]]) !!}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete
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