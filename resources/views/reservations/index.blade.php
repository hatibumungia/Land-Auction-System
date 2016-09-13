@extends('layouts.auth-user')

@section('page_title', 'Reservation')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('reservations.common.sidebar')
            </div>
            <div class="col-sm-9">

                <div class="page-header">
                    You have chose to reserve this plot
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Plot number</th>
                            <th>Block</th>
                            <th>Location</th>
                            <th>Land use</th>
                            <th>Size (sqm)</th>
                            <th>Price (TZS)</th>
                            <th>Application Payment</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--
                            TODO: if user has already paid fot that plot, it should not appear here
                        --}}
                        @foreach($unconfirmed_reservation as $row)
                            <tr>
                                <td>{{ $row->plot_no }}</td>
                                <td>{{ $row->block }}</td>
                                <td>{{ $row->location }}</td>
                                <td>{{ $row->land_use }}</td>
                                <td>{{ $row->size }}</td>
                                <td>{{ $row->price }}</td>
                                <td>


                                    <a class="btn btn-primary" data-toggle="modal" href='#modal-id'><i
                                                class="fa fa-money"></i> Pay</a>
                                    <div class="modal fade" id="modal-id">
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
                                                        {{ Form::hidden('area_id', $row->area_id) }}
                                                        {{ Form::hidden('areas_type_id', $row->areas_type_id) }}
                                                        {{ Form::hidden('block_id', $row->block_id) }}
                                                        {{ Form::hidden('plot_id', $row->plot_id) }}
                                                        {{ Form::hidden('user_detail_id', $user_detail->user_detail_id) }}
                                                        {!! Form::label('transaction_number', 'Transaction Number') !!}
                                                        {!! Form::text('transaction_number', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>

                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>


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
