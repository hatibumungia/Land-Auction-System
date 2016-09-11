@extends('layouts.entrust')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                @include('admin.common.side_bar')
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ url('admin/staff/create') }}" class="btn btn-primary pull-right"><i
                                    class="fa fa-plus"></i>
                            Add</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">Add a Staff</div>
                            <div class="panel-body">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
