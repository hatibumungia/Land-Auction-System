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
            <button type="submit" class="btn btn-primary">Search</button>
            <button type="submit" class="btn btn-success pull-right">Export</button>
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
                                </thead>
                                <tbody>
                                @foreach($reserved_plots_statuses as $reserved_plots_status)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td class="text-right">{{ $reserved_plots_status->plotno }}</td>
                                        <td>{{ $reserved_plots_status->blockname }}</td>
                                        <td>{{ $reserved_plots_status->areaname }}</td>
                                        <td>{{ $reserved_plots_status->areatypename }}</td>
                                        <td>
                                            <a href="{{ url('/') }}">{{ $reserved_plots_status->fname }} {{ $reserved_plots_status->mname }} {{ $reserved_plots_status->lname }}</a>
                                        </td>
                                        <td>{{ $reserved_plots_status->status }}</td>
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