@extends('layouts.app')

@section('page_title', 'Reservation')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group">
                    <a href="#" class="list-group-item active"><i class="fa fa-cogs"></i></a>
                    <a href="#" class="list-group-item">All</a>
                    <a href="#" class="list-group-item">Pending</a>
                    <a href="#" class="list-group-item">Paid</a>
                </div>
            </div>
            <div class="col-sm-9">

                <div class="page-header">
                    You have chose to reserve this plot
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Location</th>
                            <th>Land use</th>
                            <th>Block</th>
                            <th>Plot number</th>
                            <th>Size (sqm)</th>
                            <th>Price (TZS)</th>
                            <th>Confirm</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($unconfirmed_reservation as $row)
                            <tr>
                                <td>{{ $row->location }}</td>
                                <td>{{ $row->land_use }}</td>
                                <td>{{ $row->block }}</td>
                                <td>{{ $row->plot_no }}</td>
                                <td>{{ $row->size }}</td>
                                <td>{{ $row->price }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger" title="Remove"><i
                                                class="fa fa-remove"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>

@endsection
