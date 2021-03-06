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
    <div class="col-xs-12"><h2>All Plots</h2></div>
</div>
<div class="row">
    <div class="col-xs-10">

        {!! Form::open(['url' => '/admin/plot-assignments/check', 'class' => 'form-horizontal', 'files' => true]) !!}
        {{ csrf_field() }}
        @include('admin.plot-assignments.publish')


    </div>

    <div class="col-xs-2">
        <a href="{{ url('/admin/plot-assignments/create') }}" class="btn btn-primary pull-right">New</a>
        
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <div class="row">
                    <div class="col-sm-4">
                        <h3 class="panel-title"><strong>Total = </strong> {{ count($plot_assignments) }}</h3>
                    </div>
                    <div class="col-sm-4 pull-right">

                        <div class="btn-group pull-right">

                            <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Publish All</a>
                            <div class="modal fade" id="modal-id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Alert</h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure, you want to publish all !
                                        </div>
                                        <div class="modal-footer">
                                            <form action="/admin/plot-assignments/publishAll" method="POST" role="form">
                                                {{ csrf_field() }}
                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-info">Yes</button>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <form action="/admin/plot-assignments/unpublishAll" class="pull-right" method="POST" role="form">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-warning">Unpublish All</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="panel-body">
            <div id="cive">
                    @if(count($plot_assignments) > 0)

                    <table name="locationsTable"  class="table-responsive table-condensed table-striped " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Eneo</th>
                                <th>Matumizi ya kiwanja</th>
                                <th>Kitalu</th>
                                <th>Namba ya kiwanja</th>
                                <th>Ukubwa</th>
                                <th>Status</th>
                                <th>Added</th>
                                <th>Published</th>
                                {{-- <th><input type="checkbox" id="checkAll" ></th> --}}
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($plot_assignments as $plot_assignment)

                            <tr>
                                <td>{{ $plot_assignment->location }}</td>
                                <td>{{ $plot_assignment->land_use }}</td>
                                <td>{{ $plot_assignment->block }}</td>
                                <td>{{ $plot_assignment->plot_no }}</td>
                                <td>{{ $plot_assignment->size }}</td>
                                <td>

                                </td>
                                <td>{{ $plot_assignment->created_at }}</td>

                                <td>
                                  @if($plot_assignment->published == 0)
                                  <form action="{{ url('/admin/plot-assignments/'.$plot_assignment->area_id.'/'.$plot_assignment->areas_type_id.'/'.$plot_assignment->block_id.'/'.$plot_assignment->plot_id) }}/publish" method="POST" role="form">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-primary">Publish</button>
                                </form>
                                @else
                                <form action="{{ url('/admin/plot-assignments/'.$plot_assignment->area_id.'/'.$plot_assignment->areas_type_id.'/'.$plot_assignment->block_id.'/'.$plot_assignment->plot_id) }}/unpublish" method="POST" role="form">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-warning">Published</button>
                                </form>
                                @endif
                            </td>

                            <td>{{ $plot_assignment->updated_at }}</td>

                       {{--  <td>
                            <input type="checkbox" name="plot" id="publish-checkbox"
                            value="{{ $plot_assignment->plot_id }}" class="pull-left">
                        </td> --}}
                    </tr>

                    @endforeach

                </tbody>
            </table>

            @else
            <h3 class="text-center">Hakuna kiwanja chochote kilichowekwa kwa muda huu</h3>
            @endif

            <script type="text/javascript">
                $(function () {

                 $("#checkAll").click(function () {
                    $('input:checkbox').not(this).prop('checked', this.checked);
                });


                 $("#btn-publish").click(function () {
                    $("#publish-status").html("");
                    var plots = [];

                    $.each($("input[name='plot']:checked"), function () {

                        plots.push($(this).val());

                    });

                    console.log("Length = " + plots.length);

                    if (plots.length > 0) {
                        console.log("Greater than 0");
                        var selectedPlots = {
                            'data': plots
                        };

                        $.ajax({
                            type: 'POST',
                            url: '/admin/plot-assignments/publish',
                            data: selectedPlots,
                            beforeSend: function () {
                                $("#btn-publish").html("Publishing...");
                            },
                            success: function (data) {
                                console.log(data);
                            },
                            fail: function () {
                                console.log("Fail");
                            }
                        });

                    } else {
                        $("#publish-status").html("Nothing to publish");
                    }

                });
             });

         </script>
     </div>
 </div>
 <div class="panel-footer">
    <strong>Total = </strong> {{ count($plot_assignments) }}
</div>
</div>
</div>
</div>

@endsection