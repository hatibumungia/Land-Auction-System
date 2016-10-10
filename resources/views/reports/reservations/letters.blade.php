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
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#unprinted" aria-controls="unprinted" role="tab" data-toggle="tab">Unprinted</a>
                </li>
                <li role="presentation">
                    <a href="#printed" aria-controls="printed" role="tab" data-toggle="tab">Printed</a>
                </li>
            </ul>
        
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="unprinted">
                    @if($letters->count() > 0)
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
                                    @unless($letter->registry_print_status == true)

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

                                    @endunless
                                @endforeach                            
                            </tbody>
                        </table>
                    @else
                        <h3 class="text-center">Empty</h3>
                    @endif
                </div>
                <div role="tabpanel" class="tab-pane" id="printed">
                    @if($letters->count() > 0)

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
                                    @unless($letter->registry_print_status == false)

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

                                    @endunless
                                @endforeach                            
                            </tbody>
                        </table>

                    @else
                        <h3 class="text-center">Empty</h3>
                    @endif                    
                </div>
            </div>
        </div>
        </div>
    </div>

@endsection