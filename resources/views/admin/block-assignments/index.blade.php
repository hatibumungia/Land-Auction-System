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
		<a href="/admin/block-assignments">Picha za Vitalu</a>
	</li>
	<li class="active">Zote</li>
</ol>

        <a href="/admin/block-assignments/create" class="btn btn-primary"><i class="fa fa-plus-square-o"></i>
            Weka</a>
    </div>

    <br>

    <div class="row">
        @if(count($block_assignments) > 0)


            <table id="locationsTable" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Eneo</th>
                    <th>Matumizi ya ardhi</th>
                    <th>Kitalu</th>
                    <th>Ramani</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Eneo</th>
                    <th>Matumizi ya ardhi</th>
                    <th>Kitalu</th>
                    <th>Ramani</th>
                </tr>
                </tfoot>
                <tbody>

                @foreach($block_assignments as $block_assignment)

                    <tr>
                        <td>{{ $block_assignment->location }}</td>
                        <td>{{ $block_assignment->land_use }}</td>
                        <td>{{ $block_assignment->block }}</td>
                        <td>
                            <a href="/img/uploads/plots/{{ $block_assignment->map }}">{{ $block_assignment->map }}</a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        @else

            <div class="alert alert-info">
                <h3 class="text-center">Hakuna picha yoyote ya kitalu iliyowekwa.</h3>
            </div>

        @endif
    </div>

@endsection