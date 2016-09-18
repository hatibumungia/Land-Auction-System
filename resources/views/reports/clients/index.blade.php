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
            <h2>Clients</h2>
            <a href="{{ url('/reports/clients/new') }}" class="btn btn-primary pull-right">New</a>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">#</h3>
                </div>
                <div class="panel-body">
                    @if(count($clients) > 0)

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Email Address</th>
                                    <th>Phone Number</th>
                                    <th>Registered</th>
                                    <th>Last Login</th>
                                    <th>Region</th>
                                    <th><i class="fa fa-info-circle"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{ $client->first_name }}</td>
                                        <td>{{ $client->middle_name }}</td>
                                        <td>{{ $client->last_name }} </td>
                                        <td>{{ $client->email_address }}</td>
                                        <td>{{ $client->phone_number }}</td>
                                        <td>{{ $client->created_at }}</td>
                                        <td>{{ $client->updated_at }}</td>
                                        <td>{{ $client->region }}</td>
                                        <td>
                                            <a href="{{ url('reports/clients/' . $client->user_detail_id) }}"
                                               data-toggle="tooltip"
                                               title="Click here for more details"><i class="fa fa-binoculars"></i></a>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    @else

                        <h2 class="text-center">Empty</h2>

                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
