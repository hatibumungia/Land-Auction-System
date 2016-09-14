@extends('layouts.reports')

@section('page_title', 'Reports')

@section('side_bar')

    @include('admin.common.nav_side_menu')

@endsection

@section('content')

    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/') }}">CDA</a>
            </li>
            <li>
                <a href="{{ url('/reports/clients') }}">Clients</a>
            </li>
            <li class="active">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</li>
        </ol>
    </div>

    <div class="row">

        <h3>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</h3>

        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#personal-info" aria-controls="personal-info" role="tab" data-toggle="tab"><i
                                class="fa fa-user fa-fw"></i> Personal
                        Info</a>
                </li>
                <li role="presentation">
                    <a href="#residential-info" aria-controls="residential-info" role="tab" data-toggle="tab"><i
                                class="fa fa-home fa-fw"></i> Residential
                        Info</a>
                </li>
                <li role="presentation">
                    <a href="#reservations" aria-controls="reservations" role="tab" data-toggle="tab"><i
                                class="fa fa-flash"></i> Reservations</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="personal-info">

                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tbody>
                            <tr>
                                <td>Fist Name</td>
                                <td>{{ $user->first_name }}</td>
                            </tr>
                            <tr>
                                <td>Middle Name</td>
                                <td>{{ $user->middle_name }}</td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>{{ $user->last_name }}</td>
                            </tr>
                            <tr>
                                <td>Photo</td>
                                <td>
                                    @if(isset($user->photo))
                                        <div class="thumbnail">
                                            <img src="/img/uploads/avatars/{{ $user->photo }}" width="100" height="100"
                                                 alt="Photo">
                                        </div>
                                    @else
                                        <div class="thumbnail">
                                            <img data-src="#" alt="No Photo">
                                            <div class="caption">
                                                <h4>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</h4>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-envelope-o"></i> Email Address</td>
                                <td>{{ $user->email_address }}</td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-phone"></i> Phone Number</td>
                                <td>{{ $user->phone_number }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="residential-info">
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tbody>
                            <tr>
                                <td>Region</td>
                                <td>{{ $user->region }}</td>
                            </tr>
                            <tr>
                                <td>District</td>
                                <td>{{ $user->district }}</td>
                            </tr>
                            <tr>
                                <td>Ward</td>
                                <td>{{ $user->ward }}</td>
                            </tr>
                            <tr>
                                <td>P.O.BOX</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="reservations">
                    <br>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Reservations</h3>
                        </div>
                        <div class="panel-body">

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <tr>
                                        <thead>
                                        <th>Plot #</th>
                                        <th>Block</th>
                                        <th>Area</th>
                                        <th>Land use</th>
                                        <th>Size (Sqm)</th>
                                        <th>Price (TZS)</th>
                                        <th>Reservation Date</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        </thead>
                                    </tr>
                                    <tbody>
                                    @if(count($user_reservations) > 0)
                                        @foreach($user_reservations as $user_reservation)
                                            <tr>
                                                <td>{{ $user_reservation->plotno }}</td>
                                                <td>{{ $user_reservation->blockname }}</td>
                                                <td>{{ $user_reservation->areaname }}</td>
                                                <td>{{ $user_reservation->areatypename }}</td>
                                                <td>{{ $user_reservation->size }}</td>
                                                <td>{{ number_format($user_reservation->size * $user_reservation->price) }}</td>
                                                <td>{{ $user_reservation->created_at }}</td>
                                                <td>{{ $user_reservation->deadline }}</td>
                                                <td>
                                                    @if($user_reservation->status ==0)
                                                        Unpaid
                                                    @else
                                                        Paid
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <h3>This user has not made any reservation yet.</h3>
                                    @endif
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
