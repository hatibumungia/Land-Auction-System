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
            {!! Form::open(['url' => '/reports/clients', 'class' => 'form-inline']) !!}
            <table class="table">
                <tbody>
                <tr>
                    <td class="text-right">
                        <div class="form-group">
                            <label for="particular">Particular</label>
                            <select name="particular" id="particular" class="form-control">
                                <option value="first_name"
                                        @if(isset($_POST['particular']))
                                        @if($_POST['particular'] == 'first_name')
                                        selected="selected"
                                        @endif
                                        @endif>First Name
                                </option>
                                <option value="last_name"
                                        @if(isset($_POST['particular']))
                                        @if($_POST['particular'] == 'last_name')
                                        selected="selected"
                                        @endif
                                        @endif>Surname
                                </option>
                                <option value="phone_number"
                                        @if(isset($_POST['particular']))
                                        @if($_POST['particular'] == 'phone_number')
                                        selected="selected"
                                        @endif
                                        @endif>Phone number
                                </option>
                                <option value="email_address"
                                        @if(isset($_POST['particular']))
                                        @if($_POST['particular'] == 'email_address')
                                        selected="selected"
                                        @endif
                                        @endif>Email address
                                </option>
                            </select>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="form-group">
                            <select name="particular_symbol" id="particular_symbol" class="form-control">
                                <option value="="
                                        @if(isset($_POST['particular_symbol']))
                                        @if($_POST['particular_symbol'] == '=')
                                        selected="selected"
                                        @endif
                                        @endif>Equal
                                </option>
                                <option value="IN"
                                        @if(isset($_POST['particular_symbol']))
                                        @if($_POST['particular_symbol'] == 'IN')
                                        selected="selected"
                                        @endif
                                        @endif>Contains
                                </option>
                            </select>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="form-group">
                            <input type="text" class="form-control" name="particular_value" id="particular_value"
                                   value="@if(isset($_POST['particular_value'])){{ $_POST['particular_value'] }}@endif">
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="form-group">
                            <label for="region">Region</label>
                            <input type="text" name="region" id="region" class="form-control"
                                   value="@if(isset($_POST['region'])){{ $_POST['region'] }}@endif">
                        </div>
                    </td>
                </tr>
                {{--
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-right">
                        <div class="form-group">
                            <label for="location">Location</label>
                            <select name="location" id="location" class="form-control">
                                <option value="">Any</option>
                                @foreach($locations as $location)
                                    <option value="{ $location->name }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="form-group">
                            <label for="landuse">Land use</label>
                            <select name="landuse" id="landuse" class="form-control">
                                <option value="">Any</option>
                                @foreach($landuses as $landuse)
                                    <option value="{{ $landuse->name }}">{{ $landuse->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
                --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right">
                        <button type="submit" class="btn btn-primary" name="search_button"><i class="fa fa-search"></i>
                            Search
                        </button>
                        <button type="submit" class="btn btn-success" name="export_excel_button"><i
                                    class="fa fa-file-excel-o"></i> Export
                        </button>
                        <button type="submit" class="btn btn-success" name="export_pdf_button"><i
                                    class="fa fa-file-pdf-o"></i> Export
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
            {!! Form::close() !!}
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Total = <strong>{{ count($clients) }}</strong></h3>
                </div>
                <div class="panel-body">
                    @if(count($clients) > 0)

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Phone Number</th>
                                    <th>Region</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            <a href="{{ url('/reports/clients/' . $client->user_detail_id) }}">{{ $client->first_name }} {{ $client->middle_name }} {{ $client->last_name }}</a>
                                        </td>
                                        <td>{{ $client->email_address }}</td>
                                        <td>{{ $client->phone_number }}</td>
                                        <td>{{ $client->region }}</td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    @else

                        <h2 class="text-center">Empty</h2>

                    @endif
                </div>
                <div class="panel-footer">
                    Total = <strong>{{ count($clients) }}</strong>
                </div>
            </div>

        </div>
    </div>
@endsection
