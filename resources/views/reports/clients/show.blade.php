@extends('layouts.reports')

@section('page_title', 'Reports')

@section('side_bar')

    @include('reports.common.side_bar')

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

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-1">
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
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="residential-info">
                    <br>

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-1">
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
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="reservations">
                    <br>

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-1">


                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">#1</h3>
                                </div>
                                <div class="panel-body">

                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <tbody>
                                            <tr>
                                                <td><strong>Plot #</strong></td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Block</strong></td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Area</strong></td>
                                                <td>Kisasa</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Land use</strong></td>
                                                <td>Makazi</td>
                                            </tr>                                            
                                            <tr>
                                                <td><strong>Size (Sqr meter)</strong></td>
                                                <td>567</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Price (TZS)</strong></td>
                                                <td>456, 896</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Reservation date</strong></td>
                                                <td>34/34/65</td>
                                            </tr>           
                                            <tr>
                                                <td><strong>Deadline</strong></td>
                                                <td>456, 896</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Status</strong></td>
                                                <td>Paid</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
