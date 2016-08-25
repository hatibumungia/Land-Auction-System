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
			<li class="active">All</li>
		</ol>

        <a href="/admin/land-uses/create" class="btn btn-primary btn-lg"><i class="fa fa-plus-square-o"></i>
            Add</a>
    </div>

    <br>

    <div class="row">

        @if(count($land_uses) > 0)


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

                @foreach($land_uses as $land_use)

                    <tr>
                        <td>{{ $land_use->areas_type_id }}</td>
                        <td><a href="/admin/land-uses/{{ $land_use->areas_type_id }}">{{ $land_use->name }}</a></td>
                        <td>{{ $land_use->created_at->diffForHumans() }}</td>
                        <td>{{ $land_use->updated_at->diffForHumans() }}</td>
                        <td><a data-toggle="tooltip" data-placement="right" title="Edit" href="/admin/land-uses/{{ $land_use->areas_type_id }}/edit"><i
                                        class="fa fa-edit"></i></a>
                        </td>

                        <td>


                            <a data-toggle="tooltip" data-placement="right" title="Delete" class="btn btn-danger" data-toggle="modal" href='#{{ $land_use->areas_type_id }}'><i
                                        class="fa fa-trash"></i></a>
                            <div class="modal fade" id="{{ $land_use->areas_type_id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Deleting {{ $land_use->name }}</h4>
                                        </div>
                                        <div class="modal-body">

                                            <p class="lead">Are you sure that you want to delete
                                                <strong>{{ $land_use->name }}</strong> ?</p>

                                        </div>
                                        <div class="modal-footer">

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.land-uses.destroy', $land_use->areas_type_id]]) !!}
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
                <h3>No land use added yet</h3>
            </div>

        @endif

    </div>

@endsection