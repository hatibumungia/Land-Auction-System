@extends('layouts.app')

@section('page_title', 'Viwanja Vyako')

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
                        <h3>Viwanja Ulivyovihifadhi</h3>
                    </div>


                    @include('common.errors')

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Namba ya Kiwanja</th>
                                <th>Kitalu</th>
                                <th>Eneo</th>
                                <th>Matumizi ya Ardhi</th>
                                <th>Ukubwa (Mita za Mraba)</th>
                                <th>Gharama</th>
                                <th>Mwisho wa Kulipia</th>
                                <th>Hadhi</th>
                                <th><i class="fa fa-print"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plot_reservations as $plot_reservation)
                                <tr>
                                    <td class="text-center">{{ $plot_reservation->plot_no  }}</td>
                                    <td class="text-center">{{ $plot_reservation->block  }}</td>
                                    <td class="text-center">{{ $plot_reservation->location  }}</td>
                                    <td class="text-center">{{ $plot_reservation->land_use  }}</td>
                                    <td class="text-center">{{ $plot_reservation->size  }}</td>
                                    <td class="text-center">{{ $plot_reservation->size * $plot_reservation->price  }}</td>
                                    <td class="text-center">{{ $plot_reservation->deadline  }}</td>
                                    <td>
                                        @if($plot_reservation->status == 0)

                                            <a class="btn btn-primary" data-toggle="modal"
                                               href='#{{ $plot_reservation->plot_no  }}'>Lipa</a>
                                            <div class="modal fade" id="{{ $plot_reservation->plot_no  }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">Malipa ya maombi ya kiwanja</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            {!! Form::open(['action' => ['PlotTransactionController@store']]) !!}

                                                            <div class="form-group">
                                                                {!! Form::label('transaction_number', 'Namba ya Muamala') !!}
                                                                {!! Form::text('transaction_number', null, ['class' => 'form-control', 'placeholder' => 'Mfano. 3HS474J48', 'required' => 'required']) !!}
                                                            </div>

                                                            {!! Form::hidden('plot_id', $plot_reservation->plot_id) !!}


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">
                                                                    Cancel
                                                                </button>
                                                                <button type="submit" class="btn btn-primary"> Endelea
                                                                </button>
                                                            </div>

                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        @else
                                            <strong>Kimelipiwa</strong>
                                    @endif
                                    <td>
                                        @if($plot_reservation->status == 1)

                                            <a href="/reservation/print-preview/{{ $plot_reservation->plot_no }}"
                                               class="btn btn-primary">Barua</a>

                                        @else

                                            <strong>Hakijalipiwa
                                            </strong>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                @else

                    <div class="text-center" style="padding-top: 8em;">
                        <p class="lead">Paka sasa haujachagua kiwanja chochote.</p>
                        <h2>Bonyeza <a href="/">hapa</a> kuchagua kiwanja.</h2>
                    </div>

                @endif

            </div>
        </div>
    </div>

@endsection
