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
    <div class="col-xs-12">

        {!! Form::open(['url' => '/admin/publish/report', 'class' => 'form-horizontal', 'files' => true]) !!}
        {{ csrf_field() }}
        @include('reportsGenerator.published_form')


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

                            

                        </div>
                        
                    </div>
                </div>

            </div>
            <div class="panel-body">
            <div id="cive">
                    @if(count($plot_assignments) > 0)

                    <table name="locationsTable"  class="table-responsive table-condensed table-striped " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Eneo</th>
                                <th>Matumizi ya kiwanja</th>
                                <th>Kitalu</th>
                                <th>Namba ya kiwanja</th>
                                <th>Status</th>
                                <th>Added</th>
                                <th>Published</th>
                                
                                {{-- <th>Published</th> --}}
                                {{-- <th><input type="checkbox" id="checkAll" ></th> --}}
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($plot_assignments as $plot_assignment)

                            <tr>
                                <td>{{$counts++}}</td>
                                <td>{{ $plot_assignment->location }}</td>
                                <td>{{ $plot_assignment->land_use }}</td>
                                <td>{{ $plot_assignment->block }}</td>
                                <td>{{ $plot_assignment->plot_no }}</td>
                                
                                <td>{{ $plot_assignment->status }}</td>
                                <td>{{ $plot_assignment->updated_at }}</td>
                                    
                                <td>
                                    @if (($plot_assignment->published) == true) 
                                        Published
                                        @else
                                        <span style="color: red;">Unpublished</span>
                                        @endif                                    
                                 </td>
                                

                            

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

            {{-- <script type="text/javascript">
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

         </script> --}}
     </div>
 </div>
 <div class="panel-footer">
    <strong>Total = </strong> {{ count($plot_assignments) }}
</div>
</div>
</div>
</div>

@endsection