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
            <h2>All Plots</h2>
            <a href="{{ url('/admin/plot-assignments/create') }}" class="btn btn-primary pull-right">New</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Total = </strong> {{ count($plot_assignments) }}</h3>
                </div>
                <div class="panel-body">
                    @if(count($plot_assignments) > 0)


                        <table id="locationsTable" class="display" cellspacing="0" width="100%">
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
                                <th><input type="checkbox" id="checkAll"></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Eneo</th>
                                <th>Matumizi ya kiwanja</th>
                                <th>Kitalu</th>
                                <th>Namba ya kiwanja</th>
                                <th>Ukubwa</th>
                                <th>Status</th>
                                <th>Added</th>
                                <th>Published</th>
                                <th><input type="checkbox" id="checkAll"></th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach($plot_assignments as $plot_assignment)

                                <tr>
                                    <td>{{ $plot_assignment->location }}</td>
                                    <td>{{ $plot_assignment->land_use }}</td>
                                    <td>{{ $plot_assignment->block }}</td>
                                    <td>{{ $plot_assignment->plot_no }}</td>
                                    <td>{{ $plot_assignment->size }}</td>
                                    <td>
                                        @if($plot_assignment->published == 0)
                                            Unpublished
                                        @else
                                            Published
                                        @endif
                                    </td>
                                    <td>{{ $plot_assignment->created_at }}</td>
                                    <td>{{ $plot_assignment->updated_at }}</td>
                                    <td>
                                        <input type="checkbox" name="plot" id="publish-checkbox"
                                               value="{{ $plot_assignment->plot_id }}">
                                    </td>
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
                <div class="panel-footer">
                    <strong>Total = </strong> {{ count($plot_assignments) }}
                </div>
            </div>
        </div>
    </div>

@endsection