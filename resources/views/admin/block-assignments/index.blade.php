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
            <h2>Block maps</h2>
            <a href="{{ url('/admin/block-assignments/create') }}" class="btn btn-primary pull-right">New</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Total = </strong> {{ count($block_assignments) }}</h3>
                </div>
                <div class="panel-body">

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

                <h3 class="text-center">Hakuna picha yoyote ya kitalu iliyowekwa.</h3>

        @endif
                </div>
                <div class="panel-footer">
                    <strong>Total = </strong> {{ count($block_assignments) }}
                </div>
            </div>
        </div>
    </div>

@endsection