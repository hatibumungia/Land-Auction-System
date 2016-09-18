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
            <h2>Reservations</h2>
            <a href="{{ url('/admin/locations/create') }}" class="btn btn-primary pull-right">New</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">All</h3>
                </div>
                <div class="panel-body">
                    @if(count($all_plots_statuses) > 0)

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Plot #</th>
                                    <th>Block</th>
                                    <th>Area</th>
                                    <th>Size (Sqr meter)</th>
                                    <th>Price (TZ)</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($all_plots_statuses as $all_plots_statuse)
                                    <tr>
                                        <td>{{ $all_plots_statuse->plotno }}</td>
                                        <td>{{ $all_plots_statuse->blockname }}</td>
                                        <td>{{ $all_plots_statuse->areaname }}</td>
                                        <td>{{ $all_plots_statuse->size }}</td>
                                        <td>{{ number_format($all_plots_statuse->size * $all_plots_statuse->price) }}</td>
                                        <td>
                                            @if($all_plots_statuse->status == 0)

                                                Unreserved

                                            @else

                                                Reserved

                                            @endif

                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                            {{ $all_plots_statuses->links() }}

                        </div>

                    @else

                        <h2>Empty</h2>

                    @endif

                    @if(count($reserved_plots_statuses))

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Plot #</th>
                                    <th>Block</th>
                                    <th>Area</th>
                                    <th>Size (Sqr meter)</th>
                                    <th>Price (TZS)</th>
                                    <th>Customer</th>
                                    <th>Date of Reservation</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reserved_plots_statuses as $reserved_plots_status)
                                    <tr>
                                        <td>{{ $reserved_plots_status->plotno }}</td>
                                        <td>{{ $reserved_plots_status->blockname }}</td>
                                        <td>{{ $reserved_plots_status->areaname }}</td>
                                        <td>{{ $reserved_plots_status->size }}</td>
                                        <td>{{ number_format($reserved_plots_status->size * $reserved_plots_status->price) }}</td>
                                        <td>
                                            <a href="{{ url('/reports/clients/' . $reserved_plots_status->userdetailid) }}">{{ $reserved_plots_status->fname }} {{ $reserved_plots_status->mname }} {{ $reserved_plots_status->lname }}</a>
                                        </td>
                                        <td>{{ $reserved_plots_status->created_at }}</td>
                                        <td>{{ $reserved_plots_status->deadline }}</td>
                                        <td>
                                            @if($reserved_plots_status->status == 1)
                                                Paid
                                            @else
                                                Unpaid
                                            @endif

                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>


                            {{ $reserved_plots_statuses->links() }}

                        </div>

                    @else

                        <h3>Empty</h3>

                    @endif



                    @if(count($unreserved_plots) > 0)

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Plot #</th>
                                    <th>Block</th>
                                    <th>Area</th>
                                    <th>Size (Sqr meter)</th>
                                    <th>Price (TZS)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($unreserved_plots as $unreserved_plot)
                                    <tr>
                                        <td>{{ $unreserved_plot->plotno }}</td>
                                        <td>{{ $unreserved_plot->blockname }}</td>
                                        <td>{{ $unreserved_plot->areaname }}</td>
                                        <td>{{ $unreserved_plot->size }}</td>
                                        <td>{{ number_format($unreserved_plot->size * $unreserved_plot->price) }}</td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                            {{ $unreserved_plots->links() }}

                        </div>

                    @else

                        <h2>Empty</h2>

                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
