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
        <a href="/admin/block-assignments/create" class="btn btn-primary btn-lg"><i class="fa fa-plus-square-o"></i>
            Add</a>
    </div>

    <br>

    <div class="row">
        @if(count($block_assignments) > 0)


            <table id="locationsTable" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Location</th>
                    <th>Land use</th>
                    <th>Block</th>
                    <th>Map</th>
                    {{--                    <th><i class="fa fa-cog"></i></th>
                                        <th><i class="fa fa-cog"></i></th>--}}
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Location</th>
                    <th>Land use</th>
                    <th>Block</th>
                    <th>Map</th>
                    {{--                    <th><i class="fa fa-cog"></i></th>
                                        <th><i class="fa fa-cog"></i></th>--}}
                </tr>
                </tfoot>
                <tbody>

                @foreach($block_assignments as $block_assignment)

                    <tr>
                        <td>{{ $block_assignment->location }}</td>
                        <td>{{ $block_assignment->land_use }}</td>
                        <td>{{ $block_assignment->block }}</td>
                        {{--                        <td><a href="/admin/location-assignments/{{ $location_assignment->location }}/edit" class="btn btn-default"><i
                                                                class="fa fa-edit"></i></a></td>
                                                <td>


                                                    <a class="btn btn-danger" data-toggle="modal" href='#{{ $location_assignment->location }}'><i
                                                                class="fa fa-trash"></i></a>
                                                    <div class="modal fade" id="{{ $location_assignment->location }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title">Deleting {{ $location_assignment->location }}</h4>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <p class="lead">Are you sure that you want to delete
                                                                        <strong>{{ $$location_assignment->location }}</strong> ?</p>

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


                                                </td>--}}
                        <td>
                            <a href="/img/uploads/plots/{{ $block_assignment->map }}">{{ $block_assignment->map }}</a>
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