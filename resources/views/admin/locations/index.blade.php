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
				<a href="/admin/locations">Locations</a>
			</li>
			<li class="active">All</li>
		</ol>

        <a href="/admin/locations/create" class="btn btn-primary btn-lg"><i class="fa fa-plus-square-o"></i>
            Add</a>
    </div>

    <br>

    <div class="row">
        @if(count($locations) > 0)


            <table id="locationsTable" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Added</th>
                    <th>Updated</th>
                    <th><i class="fa fa-cog"></i></th>
                    <th><i class="fa fa-cog"></i></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Added</th>
                    <th>Updated</th>
                    <th><i class="fa fa-cog"></i></th>
                    <th><i class="fa fa-cog"></i></th>
                </tr>
                </tfoot>
                <tbody>

                @foreach($locations as $location)

                    <tr>
                        <td>{{ $location->area_id }}</td>
                        <td><a href="/admin/locations/{{ $location->area_id }}">{{ $location->name }}</a></td>
                        <td>{{ $location->created_at->diffForHumans() }}</td>
                        <td>{{ $location->updated_at->diffForHumans() }}</td>
                        <td><a data-toggle="tooltip" data-placement="right" title="Edit" href="/admin/locations/{{ $location->area_id }}/edit" class="btn btn-default"><i
                                        class="fa fa-edit"></i></a></td>
                        <td>


                            <a data-toggle="tooltip" data-placement="right" title="Delete" class="btn btn-danger" data-toggle="modal" href='#{{ $location->area_id }}'><i
                                        class="fa fa-trash"></i></a>
                            <div class="modal fade" id="{{ $location->area_id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Deleting {{ $location->name }}</h4>
                                        </div>
                                        <div class="modal-body">

                                            <p class="lead">Are you sure that you want to delete
                                                <strong>{{ $location->name }}</strong> ?</p>

                                        </div>
                                        <div class="modal-footer">

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.locations.destroy', $location->area_id]]) !!}
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                                            </button>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                                Delete
                                            </button>
                                            {!! Form::close() !!}

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        @else

            <div class="alert alert-info">
                <h3 class="text-center">No location added yet</h3>
            </div>

        @endif
    </div>

@endsection