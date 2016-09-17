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
            <a href="{{ url('/admin/locations/create') }}" class="btn btn-primary pull-right">New</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Total = </strong> {{ count($locations) }}</h3>
                </div>
                <div class="panel-body">
                    @if(count($locations) > 0)
                        <table id="locationsTable" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Eneo</th>
                                <th>Liliongezwa</th>
                                <th>Lilihaririwa</th>
                                <th><i class="fa fa-cog"></i></th>
                                <th><i class="fa fa-cog"></i></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Eneo</th>
                                <th>Liliongezwa</th>
                                <th>Lilihaririwa</th>
                                <th><i class="fa fa-cog"></i></th>
                                <th><i class="fa fa-cog"></i></th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach($locations as $location)

                                <tr>
                                    <td>{{ $location->area_id }}</td>
                                    <td><a href="/admin/locations/{{ $location->area_id }}">{{ $location->name }}</a>
                                    </td>
                                    <td>{{ $location->created_at->diffForHumans() }}</td>
                                    <td>{{ $location->updated_at->diffForHumans() }}</td>
                                    <td><a data-toggle="tooltip" data-placement="right" title="Hariri"
                                           href="/admin/locations/{{ $location->area_id }}/edit"><i
                                                    class="fa fa-edit"></i></a></td>
                                    <td>


                                        <a title="Futa" class="btn btn-danger" data-toggle="modal"
                                           href='#{{ $location->area_id }}'><i
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

                                                        <p class="lead">Je, una uhakika kwamba unataka kufuta eneo la
                                                            <strong>{{ $location->name }}</strong> ?</p>

                                                    </div>
                                                    <div class="modal-footer">

                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.locations.destroy', $location->area_id]]) !!}
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">
                                                            Acha
                                                        </button>
                                                        <button type="submit" class="btn btn-danger"><i
                                                                    class="fa fa-trash"></i>
                                                            Futa
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
                            <h3 class="text-center">Hakuna eneo lolote lililowekwa kwa muda huu.</h3>
                        </div>

                    @endif
                </div>
                <div class="panel-footer">
                    <strong>Total = </strong> {{ count($locations) }}
                </div>
            </div>
        </div>
    </div>

@endsection