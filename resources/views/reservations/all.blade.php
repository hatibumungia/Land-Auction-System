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
            <h2>Viwanja Ulivyovihifadhi</h2>
            <a href="{{ url('/') }}" class="btn btn-primary pull-right">Ongeza kingine</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                @if(Session::has('plot_status'))
                    <div class="alert alert-info">

                        <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">&times;</button>

                        <p class="lead">{{ Session::get('plot_status') }}</p>
                    </div>
                @endif
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Total = </strong> {{ count($plot_reservations) }}</h3>
                </div>
                <div class="panel-body">

                    @if(count($plot_reservations) > 0)

                        @include('common.errors')

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-right">Namba ya Kiwanja</th>
                                    <th>Kitalu</th>
                                    <th>Eneo</th>
                                    <th>Matumizi ya Ardhi</th>
                                    <th class="text-right">Ukubwa (Mita za Mraba)</th>
                                    <th class="text-right">Gharama (TZS)</th>
                                    <th class="text-right">Mwisho wa Kulipia</th>
                                    <th><i class="fa fa-print"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($plot_reservations as $plot_reservation)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td class="text-right">{{ $plot_reservation->plot_no  }}</td>
                                        <td>{{ $plot_reservation->block  }}</td>
                                        <td>{{ $plot_reservation->location  }}</td>
                                        <td>{{ $plot_reservation->land_use  }}</td>
                                        <td class="text-right">{{ $plot_reservation->size  }}</td>
                                        <td class="text-right">{{ number_format($plot_reservation->size * $plot_reservation->price)  }}</td>
                                        <td class="text-right">{{ $plot_reservation->deadline  }}</td>
                                        <td>
                                            @if($plot_reservation->status == 0)

                                                <a class="btn btn-primary" data-toggle="modal"
                                                   href='#{{ $plot_reservation->plot_no  }}'
                                                   title="Bonyeza hapa ulipie maombi ya hiki kiwanja"><i
                                                            class="fa fa-mobile-phone"></i> Lipa</a>
                                                <div class="modal fade" id="{{ $plot_reservation->plot_no  }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Malipo ya maombi ya
                                                                    kiwanja</h4>
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
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Endelea
                                                                    </button>
                                                                </div>

                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            @else
                                                <a href="/reservation/print-preview/{{ $plot_reservation->plot_no }}"
                                                   class="btn btn-success"
                                                   title="Bonyeza hapa kupata barua ya maombi ya hiki kiwanja">Barua</a>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        

                    @else

                        <div class="text-center" style="padding: 4em 0 4em 0;">
                            <p class="lead">Mpaka sasa hauna kiwanja chochote.</p>
                            <h2>Bonyeza <a href="/">hapa</a> kuchagua kiwanja.</h2>
                        </div>

                    @endif
                </div>
                <div class="panel-footer">
                    <strong>Total = </strong> {{ count($plot_reservations) }}
                </div>
            </div>
        </div>

    </div>

@endsection