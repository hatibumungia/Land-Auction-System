@extends('layouts.admin')

@section('page_title', 'letters')

@section('nav_bar')

    @include('admin.common.nav_bar')

@endsection

@section('side_bar')

    @include('admin.common.nav_side_menu')

@endsection

@section('main_content')

    <div class="row">
        <div class="col-xs-12">
            <h2>Letters</h2>
            <a href="{{ url('/reservation') }}" class="btn btn-primary pull-right">Return home</a>
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
                    @if(count($letters) > 0)
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Plot #</th>
                                    <th>Block</th>
                                    <th>Location</th>
                                    <th>Land use</th>
                                    <th class="text-right">Size (Sqm)</th>
                                    <th class="text-right">Price (TZS)</th>
                                    <th>Client</th>
                                    <th><i class="fa fa-print"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($letters as $letter)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $letter->plotno }}</td>
                                        <td>{{ $letter->blockname }}</td>
                                        <td>{{ $letter->areaname }}</td>
                                        <td>{{ $letter->areatypename }}</td>
                                        <td class="text-right">{{ number_format($letter->size) }}</td>
                                        <td class="text-right">{{ number_format($letter->price * $letter->size) }}</td>
                                        <td>{{ $letter->fname }} {{ $letter->mname }} {{ $letter->lname }}</td>
                                        <th>
                                            <a href="{{ url('reports/reservations/print-letter-reports/' . $letter->areaid . '/' . $letter->areatypeid . '/' . $letter->blockid . '/' . $letter->plotid . '/') }}"
                                                   class="btn btn-success"
                                                   title="Bonyeza hapa kupata barua ya maombi ya hiki kiwanja">Barua</a>
                                        </th>
                                    </tr>
                                @endforeach                            
                            </tbody>
                        </table>
                    @else
                        <div class="text-center">Empty</div>
                    @endif

                </div>
                <div class="panel-footer">
                    <strong>#</strong>
                </div>
            </div>
        </div>
    </div>

@endsection