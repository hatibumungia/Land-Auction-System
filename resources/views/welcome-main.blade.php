@extends('layouts.app')

@section('page_title', 'Welcome')

@section('content')

    <div class="container">

        @if(count($areas_locations) > 0)

            <div class="row">
                <div class="col-sm-4">
                    <h3>Unataka kiwanja katika eneo gani?</h3>
                    <div class="list-group" id="eneo_list">
                        <a href="/" class="list-group-item">Lolote</a>
                        @foreach($areas_locations as $areas_location)
                            <a href="/?eneo={{ $areas_location->areaname }}" class="list-group-item"
                               data-area-id="{{ $areas_location->areaname }}">
                                <span class="badge">{{ $areas_location->available_plots }}</span>
                                {{ $areas_location->areaname }}
                            </a>
                        @endforeach
                    </div>
                </div>
                @if(count($areatypenames) > 0)
                    <div class="col-sm-4">
                        <h3>Kwa ajili ya matumizi gani?</h3>
                        <div class="list-group">
                            <a href="/?eneo={{ $_GET['eneo'] }}" class="list-group-item">Yoyote</a>
                            @foreach($areatypenames as  $areatypename)
                                <a href="/?eneo={{ $_GET['eneo'] }}&matumizi-ya-ardhi={{ $areatypename->areatypename }}"
                                   class="list-group-item">
                                    <span class="badge">{{ $areatypename->available_area_types_names }}</span>
                                    {{ $areatypename->areatypename }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-12">

                    <h2 class="text-center text-success">Orodha ya viwanja vilivyopo.</h2>

                    <div class="table-responsive">


                        <table class="table table-hover">
                            <tr>
                                <thead>
                                <th class="text-center">Namba ya Kiwanja</th>
                                <th>Eneo</th>
                                <th class="text-center">Matumizi ya ardhi</th>
                                <th class="text-center">Kitalu</th>
                                <th class="text-center">Ukubwa (Mita za mraba)</th>
                                <th class="text-center">Gharama (TZS)</th>
                                <th class="text-center">Hifadhi</th>
                                </thead>
                            </tr>
                            <tbody>
                            @foreach($available_plots as $available_plot)
                                <tr>
                                    <td class="text-center">{{ $available_plot->plotno }}</td>
                                    <td>{{ $available_plot->areaname }}</td>
                                    <td class="text-center">{{ $available_plot->areatypename }}</td>
                                    <td class="text-center">{{ $available_plot->blockname }}</td>
                                    <td class="text-center">{{ $available_plot->size }}</td>
                                    <td class="text-center">{{ number_format($available_plot->size * $available_plot->price) }}</td>
                                    <td class="text-center">

                                        <?php $modal_id = $available_plot->areaid . "" . $available_plot->areatypeid . "" . $available_plot->blockid . "" . $available_plot->plotid; ?>

                                        <a class="btn btn-primary" data-toggle="modal"
                                           href='#{{ $modal_id }}'>Hifadhi</a>
                                        <div class="modal fade" id="{{ $modal_id }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">&times;</button>
                                                        <h3 class="modal-title text-primary">Taarifa za kiwanja
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
                                                            <i class="fa fa-remove"></i> Ghairisha
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
            <div class="row text-center">
                <div class="col-sm-12">
                    {{ $available_plots->appends(request()->input())->links() }}
                </div>
            </div>

        @else

            <div class="row">
                <div class="col-sm-12-text-center">
                    <h2>Hakuna viwanja vyovyote kwa sasa. Tafadhali tutembelee baada ya muda.</h2>
                </div>
            </div>

        @endif

    </div>

@endsection
                                                                                                                                                