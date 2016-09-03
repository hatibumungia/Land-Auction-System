@extends('layouts.app')

@section('page_title', 'All Reservations')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('reservations.common.sidebar')
            </div>
            <div class="col-sm-9">


                <div class="text-center">
                    <p class="lead">{{ Session::get('plot_status') }}</p>
                </div>

                @if(count($plot_reservations) > 0)

                    <div class="page-header">
                        <h3>Your Plots</h3>
                    </div>


                    @include('common.errors')

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Plot #</th>
                                <th>Block</th>
                                <th>Location</th>
                                <th>Land Use</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th><i class="fa fa-print"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plot_reservations as $plot_reservation)
                                <tr>
                                    <td>{{ $plot_reservation->plot_no  }}</td>
                                    <td>{{ $plot_reservation->block  }}</td>
                                    <td>{{ $plot_reservation->location  }}</td>
                                    <td>{{ $plot_reservation->land_use  }}</td>
                                    <td>{{ $plot_reservation->size  }}</td>
                                    <td>{{ $plot_reservation->size * $plot_reservation->price  }}</td>
                                    <td>{{ $plot_reservation->deadline  }}</td>
                                    <td>
                                        @if($plot_reservation->status == 0)

                                            <a class="btn btn-primary btn-sm" data-toggle="modal"
                                               href='#{{ $plot_reservation->plot_no  }}'><i
                                                        class="fa fa-money"></i> Pay</a>
                                            <div class="modal fade" id="{{ $plot_reservation->plot_no  }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">Application Payment</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            {!! Form::open(['action' => ['PlotTransactionController@store']]) !!}

                                                            <div class="form-group">
                                                                {!! Form::label('transaction_number') !!}
                                                                {!! Form::text('transaction_number', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                                            </div>

                                                            {!! Form::hidden('plot_no', $plot_reservation->plot_no) !!}


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">
                                                                    Cancel
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">Submit
                                                                </button>
                                                            </div>

                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                @else
                                                    <span class="label label-success"><i class="fa fa-check"></i> Paid</span>
                                    @endif
                                    <td><a href="/reservation/print-preview/{{ $plot_reservation->plot_no }}"
                                           class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o"></i> Print</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                @else

                    <div class="text-center" style="padding-top: 8em;">
                        <p class="lead">You have not made any reservation, go to the welcome page to reserve a plot.</p>
                        <h2>Click <a href="/">here</a> to choose a plot.</h2>
                    </div>

                @endif

            </div>
        </div>
    </div>

@endsection
