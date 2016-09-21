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
            <h2>All Area maps</h2>
            <a href="/admin/location-images/create" class="btn btn-primary pull-right">New</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Total = </strong> {{ count($area_images) }}</h3>
                </div>
                <div class="panel-body">
                    @if(count($area_images) > 0)
                        <table id="locationsTable" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Eneo</th>
                                <th>Ramani</th>
                                <th>Liliongezwa</th>
                                <th>Lilihaririwa</th>
                                {{-- <th><i class="fa fa-cog"></i></th>--}}
                                <th><i class="fa fa-cog"></i></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Eneo</th>
                                <th>Ramani</th>
                                <th>Liliongezwa</th>
                                <th>Lilihaririwa</th>
                                {{--<th><i class="fa fa-cog"></i></th>--}}
                                <th><i class="fa fa-cog"></i></th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach($area_images as $area_image)

                                <tr>
                                    <td>{{ $area_image->area_id }}</td>
                                    <td>
                                        <a href="/admin/location-images/{{ $area_image->area_id }}">{{ $area_image->name }}</a>
                                    </td>
                                    <td>
                                        <a href="/img/uploads/areas/{{ $area_image->file_name }}">{{ $area_image->file_name }}</a>
                                    </td>
                                    <td>{{ $area_image->created_at }}</td>
                                    <td>{{ $area_image->updated_at }}</td>
                                    {{--<td><a data-toggle="tooltip" data-placement="right" title="Hariri" href="/admin/location-images/{{ $area_image->area_id }}/edit"><i
                                                    class="fa fa-edit"></i></a></td>--}}
                                    <td>


                                        <a title="Futa" class="btn btn-danger" data-toggle="modal"
                                           href='#{{ $area_image->area_id }}'><i
                                                    class="fa fa-trash"></i></a>
                                        <div class="modal fade" id="{{ $area_image->area_id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Deleting {{ $area_image->name }}</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <p class="lead">Je, una uhakika kwamba unataka kufuta ramani ya
                                                            eneo la
                                                            <strong>{{ $area_image->name }}</strong> ?</p>

                                                    </div>
                                                    <div class="modal-footer">

                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.location-images.destroy', $area_image->area_id]]) !!}
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Acha
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
                        <h3 class="text-center">Hakuna ramani za eneo lolote zilizowekwa kwa muda huu.</h3>
                    @endif
                </div>
                <div class="panel-footer">
                    <strong>Total = </strong> {{ count($area_images) }}
                </div>
            </div>
        </div>
    </div>

@endsection