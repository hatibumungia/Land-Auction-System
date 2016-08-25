@extends('layouts.admin')

@section('page_title' , ' - Admin')

@section('nav_bar')

    @include('admin.common.nav_bar')

@endsection

@section('side_bar')

    @include('admin.common.nav_side_menu')

@endsection

@section('main_content')

 <div class="row">
 	
        <ol class="breadcrumb">
            <li>
                <a href="/admin/dashboard">Home</a>
            </li>
            <li>
                <a href="/admin/land-uses">Land use</a>
            </li>
            <li class="active">{{ $land_use->name }}</li>
        </ol>

    <h2>{{ $land_use->name }}</h2>

    <a class="btn btn-danger btn-lg" data-toggle="modal" href='#{{ $land_use->areas_type_id }}'><i
                class="fa fa-trash"></i> Delete</a>
    <div class="modal fade" id="{{ $land_use->areas_type_id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Deleting {{ $land_use->name }}</h4>
                </div>
                <div class="modal-body">

                    <p class="lead">Are you sure that you want to delete <strong>{{ $land_use->name }}</strong> ?</p>

                </div>
                <div class="modal-footer">

                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.land-uses.destroy', $land_use->areas_type_id]]) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

 </div>

@endsection