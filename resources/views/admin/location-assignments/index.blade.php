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
            <h2>All Areas</h2>
            <a href="{{ url('/admin/location-assignments/create') }}" class="btn btn-primary pull-right">New</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Total = </strong> {{ count($location_assignments) }}</h3>
                </div>
                <div class="panel-body">

                    @if(count($location_assignments) > 0)
                        <table id="locationsTable" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Eneo</th>
                                <th>Matumizi ya ardhi</th>
                                <th>Gharama</th>
                                <th><i class="fa fa-cog"></i></th>
                                {{--<th><i class="fa fa-cog"></i></th>--}}
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Eneo</th>
                                <th>Matumizi ya ardhi</th>
                                <th>Gharama</th>
                                <th><i class="fa fa-cog"></i></th>
                                {{--<th><i class="fa fa-cog"></i></th>--}}
                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach($location_assignments as $location_assignment)

                                <tr>
                                    <td>{{ $location_assignment->location }}</td>
                                    <td>{{ $location_assignment->land_use }}</td>
                                    <td>{{ $location_assignment->price }}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="right" title="Edit"
                                           href="/admin/location-assignments/{{ $location_assignment->location }}/{{ $location_assignment->land_use }}/{{ $location_assignment->price }}/edit"
                                        ><i
                                                    class="fa fa-edit"></i></a></td>
                                    {{--<td>--}}


                                    {{--<a title="Delete" class="btn btn-danger" data-toggle="modal" href='#1'><i--}}
                                    {{--class="fa fa-trash"></i></a>--}}
                                    {{--<div class="modal fade" id="1">--}}
                                    {{--<div class="modal-dialog">--}}
                                    {{--<div class="modal-content">--}}
                                    {{--<div class="modal-header">--}}
                                    {{--<button type="button" class="close" data-dismiss="modal"--}}
                                    {{--aria-hidden="true">&times;</button>--}}
                                    {{--<h4 class="modal-title">Futa {{ $location_assignment->location }}</h4>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-body">--}}

                                    {{--<p class="lead">Je, una uhakika kwamba unataka kufuta--}}
                                    {{--<strong>{{ $location_assignment->location }}</strong> ?</p>--}}

                                    {{--</div>--}}
                                    {{--<div class="modal-footer">--}}

                                    {{--{!! Form::open(['method' => 'DELETE', 'url' => ['admin\location-assignments\destroy', $location_assignment->location]]) !!}--}}
                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Acha--}}
                                    {{--</button>--}}
                                    {{--<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>--}}
                                    {{--Futa--}}
                                    {{--</button>--}}
                                    {{--{!! Form::close() !!}--}}

                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}


                                    {{--</td>--}}
                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    @else

                        <div class="alert alert-info">
                            <h3 class="text-center">Kwa muda huu hakuna</h3>
                        </div>

                    @endif
                </div>
                <div class="panel-footer">
                    <strong>Total = </strong> {{ count($location_assignments) }}
                </div>
            </div>
        </div>
    </div>

@endsection