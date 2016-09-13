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
				<a href="/admin/dashboard">Nyumbani</a>
			</li>
			<li>
				<a href="/admin/land-uses">Matumizi ya ardhi</a>
			</li>
			<li class="active">Yote</li>
		</ol>

        <a href="/admin/land-uses/create" class="btn btn-primary"><i class="fa fa-plus-square-o"></i>
            Ongeza</a>
    </div>

    <br>

    <div class="row">

        @if(count($land_uses) > 0)


            <table id="locationsTable" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Matumizi</th>
                    <th>Iliongezwa</th>
                    <th>Ilihaririwa</th>
                    <th><i class="fa fa-cog"></i></th>
                    <th><i class="fa fa-cog"></i></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Matumizi</th>
                    <th>Iliongezwa</th>
                    <th>Ilihaririwa</th>
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
                        <td><a data-toggle="tooltip" data-placement="right" title="Hariri" href="/admin/land-uses/{{ $land_use->areas_type_id }}/edit"><i
                                        class="fa fa-edit"></i></a>
                        </td>

                        <td>


                            <a title="Futa" class="btn btn-danger" data-toggle="modal" href='#{{ $land_use->areas_type_id }}'><i
                                        class="fa fa-trash"></i></a>
                            <div class="modal fade" id="{{ $land_use->areas_type_id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Kufuta {{ $land_use->name }}</h4>
                                        </div>
                                        <div class="modal-body">

                                            <p class="lead">Je, una uhakika kwamba unataka kufuta matumizi ya ardhi ya
                                                <strong>{{ $land_use->name }}</strong> ?</p>

                                        </div>
                                        <div class="modal-footer">

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.land-uses.destroy', $land_use->areas_type_id]]) !!}
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Acha
                                            </button>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
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
                <h3>Hakuna matumizi ya ardhi yaliwekwa sasa hivi.</h3>
            </div>

        @endif

    </div>

@endsection