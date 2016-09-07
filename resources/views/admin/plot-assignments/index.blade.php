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
		<a href="/admin/plot-assignments">Ukubwa wa viwanja</a>
	</li>
	<li class="active">Vyote</li>
</ol>

        <a href="/admin/plot-assignments/create" class="btn btn-primary"><i class="fa fa-plus-square-o"></i>
            Weka</a>
    </div>

    <br>

    <div class="row">

        <h3>Viwanja</h3>

        @if(count($plot_assignments) > 0)


            <table id="locationsTable" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Eneo</th>
                    <th>Matumizi ya kiwanja</th>
                    <th>Kitalu</th>
                    <th>Namba ya kiwanja</th>
                    <th>Ukubwa</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Eneo</th>
                    <th>Matumizi ya kiwanja</th>
                    <th>Kitalu</th>
                    <th>Namba ya kiwanja</th>
                    <th>Ukubwa</th>
                </tr>
                </tfoot>
                <tbody>

                @foreach($plot_assignments as $plot_assignment)

                    <tr>
                        <td>{{ $plot_assignment->location }}</td>
                        <td>{{ $plot_assignment->land_use }}</td>
                        <td>{{ $plot_assignment->block }}</td>
                        <td>{{ $plot_assignment->plot_no }}</td>
                        <td>{{ $plot_assignment->size }}</td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        @else

            <div class="alert alert-info alert-important">
                <h3 class="text-center">Hakuna kiwanja chochote kilichowekwa kwa muda huu</h3>
            </div>

        @endif


    </div>

@endsection