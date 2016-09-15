@extends('layouts.app')

@section('page_title', 'Karibu')

@section('content')

    <div class="container">

        @if(count($areas_locations) > 0)

            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Unataka kiwanja katika eneo gani?</h3>
                        </div>
                        <table class="table">
                            <tbody id="eneo_list">
                            @foreach($areas_locations as $areas_location)
                                <tr>
                                    <td><a title="Viwanja vilivyobaki {{ $areas_location->available_plots }}"
                                           href="/?eneo={{ $areas_location->areaname }}" class="list-group-item"
                                           data-area-id="{{ $areas_location->areaname }}">
                                            <span class="badge">{{ $areas_location->available_plots }}</span>
                                            {{ $areas_location->areaname }}
                                        </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if(count($areatypenames) > 0)
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Kwa ajili ya matumizi gani?</h3>
                            </div>
                            <table class="table">
                                <tbody>
                                <!-- <a href="/?eneo={{ $_GET['eneo'] }}" class="list-group-item">Yoyote</a> -->
                                @foreach($areatypenames as  $areatypename)

                                    <tr>
                                        <td>
                                            <a title="Viwanja vilivyobaki {{ $areatypename->available_area_types_names }}"
                                               href="/?eneo={{ $_GET['eneo'] }}&matumizi-ya-ardhi={{ $areatypename->areatypename }}"
                                               class="list-group-item">
                                                <span class="badge">{{ $areatypename->available_area_types_names }}</span>
                                                {{ $areatypename->areatypename }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                @if(count($area_maps) > 0)
                    <div class="col-sm-4" style="float: right">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ramani</h3>
                            </div>
                            <div class="panel-body" style="height: 300px; overflow: scroll;">
                                <h4>Maeneo</h4>
                                <ol>
                                    @foreach($area_maps as $area_map)
                                        <li>
                                            <a href="{{ url('img/uploads/areas/' . $area_map['map']) }}"
                                               target="_blank">{{ $area_map['area'] }}</a>
                                        </li>
                                    @endforeach
                                </ol>
                                @if(count($block_maps) > 0)
                                    <h4>Vitalu</h4>
                                    <ol>
                                        @foreach($block_maps as $block_map)
                                            <li>
                                                <a href="{{ url('img/uploads/plots/' . $block_map['map']) }}"
                                                   target="_blank">{{ $block_map['block'] }}</a>
                                            </li>
                                        @endforeach
                                    </ol>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Orodha ya viwanja vilivyopo.</h3>
                        </div>
                        <div class="panel-body">

                            <div class="table-responsive">


                                <table class="table table-hover">
                                    <tr>
                                        <thead>
                                        <th>Namba ya Kiwanja</th>
                                        <th>Eneo</th>
                                        <th>Matumizi ya ardhi</th>
                                        <th>Kitalu</th>
                                        <th>Ukubwa (Mita za mraba)</th>
                                        <th>Gharama (TZS)</th>
                                        <th>Hifadhi</th>
                                        </thead>
                                        <tbody>
                                        @foreach($available_plots as $available_plot)
                                            <tr>
                                                <td>{{ $available_plot->plotno }}</td>
                                                <td>{{ $available_plot->areaname }}</td>
                                                <td>{{ $available_plot->areatypename }}</td>
                                                <td>{{ $available_plot->blockname }}</td>
                                                <td>{{ $available_plot->size }}</td>
                                                <td>{{ number_format($available_plot->size * $available_plot->price) }}</td>
                                                <td>

                                                    <?php $modal_id = $available_plot->areaid . "" . $available_plot->areatypeid . "" . $available_plot->blockid . "" . $available_plot->plotid; ?>

                                                    <a class="btn btn-primary" data-toggle="modal"
                                                       href='#{{ $modal_id }}'>Hifadhi</a>
                                                    <div class="modal fade" id="{{ $modal_id }}">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-hidden="true">&times;</button>
                                                                    <h3 class="modal-title text-primary">Taarifa za
                                                                        kiwanja
                                                                        ulichochagua</h3>
                                                                </div>
                                                                <div class="modal-body">


                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                        <tr class="text-center">
                                                                            <th>Namba ya kiwanja</th>
                                                                            <th>Kitalu</th>
                                                                            <th>Eneo</th>
                                                                            <th>Matumizi ya ardhi</th>
                                                                            <th>Ukubwa (Mita za mraba)</th>
                                                                            <th>Gharama (TZS)</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr class="text-center">
                                                                            <td>{{ $available_plot->plotno }}</td>
                                                                            <td>{{ $available_plot->blockname }}</td>
                                                                            <td>{{ $available_plot->areaname }}</td>
                                                                            <td>{{ $available_plot->areatypename }}</td>
                                                                            <td>{{ $available_plot->size }}</td>
                                                                            <td>{{ number_format($available_plot->size * $available_plot->price) }}</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>


                                                                </div>
                                                                <div class="modal-footer">
                                                                    {!! Form::open(['url' => 'createreservationsessioncontroller']) !!}

                                                                    {!! Form::hidden('areaid', $available_plot->areaid) !!}
                                                                    {!! Form::hidden('areatypeid', $available_plot->areatypeid) !!}
                                                                    {!! Form::hidden('blockid', $available_plot->blockid) !!}
                                                                    {!! Form::hidden('plotid', $available_plot->plotid) !!}

                                                                    <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">
                                                                        <i class="fa fa-remove"></i> Ahirisha
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary"><i
                                                                                class="fa fa-check"></i> Endelea
                                                                    </button>

                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-12">
                    {{ $available_plots->appends(request()->input())->links() }}
                </div>
            </div>

        @else

            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="not-plots">
                        <h3>Hakuna viwanja vyovyote kwa sasa. Tafadhali tembelea hapa mara kwa mara ili kuona viwanja
                            vipya tutakavyoviweka.</h3>
                    </div>
                </div>
            </div>

        @endif

    </div>

@endsection
                                                                                                                                                