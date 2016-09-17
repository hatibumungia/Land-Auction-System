@extends('layouts.reports')

@section('page_title', 'Today Reservations')

@section('side_bar')

    <div class="list-group">
        <a href="#" class="list-group-item">Today</a>
        <a href="#" class="list-group-item">This Week</a>
        <a href="#" class="list-group-item">This Month</a>
        <a href="#" class="list-group-item">Past Six Months</a>
        <a href="#" class="list-group-item">This Year</a>
    </div>

@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">



            <!-- Split button -->
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-primary">Export</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/reports/reservations/today/print') }}"><i class="fa fa-file-excel-o"></i>
                            Excel</a></li>
                    <li><a href="#"><i class="fa fa-file-pdf-o"></i> PDF</a>
                </ul>
            </div>

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Today Reservations</h3>
                </div>
                <div class="panel-body">
                    @if(count($today_reservations) > 0)
                        <table class="table">
                            <thead>
                            <th>Plot #</th>
                            <th>Area</th>
                            <th>Land use</th>
                            <th>Block</th>
                            <th>Size (Sqm)</th>
                            <th>Price (TZS)</th>
                            <th>Client</th>
                            <th>Date of Reservation</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                            @foreach($today_reservations as $today_reservation)
                                <tr>
                                    <td>{{ $today_reservation->plotno }}</td>
                                    <td>{{ $today_reservation->areaname }}</td>
                                    <td>{{ $today_reservation->areatypename }}</td>
                                    <td>{{ $today_reservation->blockname }}</td>
                                    <td>{{ $today_reservation->size }}</td>
                                    <td>{{ number_format($today_reservation->size * $today_reservation->price) }}</td>
                                    <td>{{ $today_reservation->fname }} {{ $today_reservation->mname }} {{ $today_reservation->lname }}</td>
                                    <td>{{ $today_reservation->created_at }}</td>
                                    <td>
                                        @if($today_reservation->status == 1)
                                            Paid
                                        @else
                                            Unpaid
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="text-center">No one made a reservation today.</h3>
                    @endif
                </div>
                <div class="panel-footer">
                    Total = {{ count($today_reservations) }}
                </div>
            </div>
        </div>
    </div>

@endsection
