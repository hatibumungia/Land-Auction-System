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
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a href="{{ url('/reports/reservations/plots/'.\Carbon\Carbon::today().'/to/' . \Carbon\Carbon::now()) }}"
                   class="btn btn-default">Today</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2>Plot Details</h2>

            {!! Form::open(['url' => '/reports/reservations', 'class' => 'form-inline']) !!}
            <div class="form-group">
                <label for="plotno">Plot #</label>
                <input type="text" class="form-control" name="plotno" id="plotno"
                       value="@if(isset($_POST['plotno'])) {{  $_POST['plotno']}} @endif">
            </div>
            <div class="form-group">
                <label for="area">Area</label>
                <select class="form-control" name="area" id="area">
                    <option value="">Any</option>
                    @if(count($areas) > 0)
                        @foreach($areas as $area)
                            <option value="{{ $area->name }}"
                                    @if(isset($_POST['area']))
                                    @if($_POST['area'] == $area->name)
                                    selected="selected"
                                    @endif
                                    @endif>{{ $area->name }}</option>
                        @endforeach
                    @else
                        <option value="">Empty</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="block">Block</label>
                <select class="form-control" name="block" id="block">
                    <option value="">Any</option>
                    @if(count($blocks) > 0)
                        @foreach($blocks as $block)
                            <option value="{{ $block->name }}"
                                    @if(isset($_POST['block']))
                                    @if($_POST['block'] == $block->name)
                                    selected="selected"
                                    @endif
                                    @endif>{{ $block->name }}</option>
                        @endforeach
                    @else
                        <option value="">Empty</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="landuse">Land use</label>
                <select class="form-control" name="landuse" id="landuse">
                    <option value="">Any</option>
                    @if(count($landuses) > 0)
                        @foreach($landuses as $landuse)
                            <option value="{{ $landuse->name }}"
                                    @if(isset($_POST['landuse']))
                                    @if($_POST['landuse'] == $landuse->name)
                                    selected="selected"
                                    @endif
                                    @endif>{{ $landuse->name }}</option>
                        @endforeach
                    @else
                        <option value="">Empty</option>
                    @endif
                </select>
            </div>
                <button type="submit" class="btn btn-primary" name="search_button"><i class="fa fa-search"></i>
                    Search
                </button>
                <button type="submit" class="btn btn-success" name="export_excel_button"><i
                            class="fa fa-file-excel-o"></i> Export
                </button>
                <button type="submit" class="btn btn-success" name="export_pdf_button"><i
                            class="fa fa-file-pdf-o"></i> Export
                </button>
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Total = </strong> {{ count($reserved_plots_statuses) }}</h3>
                </div>
                <div class="panel-body">
                    @if(count($reserved_plots_statuses) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <th>#</th>
                                <th>Plot #</th>
                                <th>Block</th>
                                <th>Area</th>
                                <th>Land Use</th>
                                <th>Client</th>
                                <th>Status</th>
                                <th>Reservation Date</th>
                                <th>Due Date</th>
                                </thead>
                                <tbody>
                                @foreach($reserved_plots_statuses as $reserved_plots_status)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td class="text-right">{{ $reserved_plots_status->Plot_No }}</td>
                                        <td>{{ $reserved_plots_status->Block }}</td>
                                        <td>{{ $reserved_plots_status->Area }}</td>
                                        <td>{{ $reserved_plots_status->Land_use }}</td>
                                        <td>
                                            {{ $reserved_plots_status->First_name }} {{ $reserved_plots_status->Middle_name }} {{ $reserved_plots_status->Last_name }}
                                        </td>
                                        <td>{{ $reserved_plots_status->Status }}</td>
                                        <td>{{ $reserved_plots_status->Reservation_date }}</td>
                                        <td>{{ $reserved_plots_status->Due_date }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h3 class="text-center">Empty</h3>
                    @endif
                </div>
                <div class="panel-footer">
                    <strong>Total = </strong> {{ count($reserved_plots_statuses) }}
                </div>
            </div>
        </div>
    </div>

@endsection