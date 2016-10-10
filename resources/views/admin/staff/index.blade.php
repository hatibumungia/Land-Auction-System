@extends('layouts.admin')

@section('page_title' , ' - Admin')

@section('nav_bar')

    @include('admin.common.nav_bar')

@endsection

@section('side_bar')

    @include('admin.common.nav_side_menu')

@endsection

@section('main_content')
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        {{--<a href="{{ url('admin/staff/create') }}" class="btn btn-primary pull-right"><i
                                    class="fa fa-plus"></i>
                            Add</a>--}}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">Staff</div>
                            <div class="panel-body">
                                @if(count($staffs) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Registered</th>
                                                <th>Last Login</th>
                                                <th><i class="fa fa-edit"></i></th>
                                                <th><i class="fa fa-trash"></i></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($staffs as $staff)
                                                <tr>
                                                    <td>{{ $staff->user_detail_id }}</td>
                                                    <td>
                                                        <a href="{{ url('admin/staff/' . $staff->user_detail_id) }}">{{ $staff->first_name }} {{ $staff->middle_name }} {{ $staff->last_name }}</a>
                                                    </td>
                                                    <td>{{ $staff->email_address }}</td>
                                                    <td>{{ $staff->display_name }}</td>
                                                    <td>{{ $staff->created_at }}</td>
                                                    <td>{{ $staff->updated_at }}</td>
                                                    <td><a href="{{ url('admin/staff/' . $staff->user_detail_id . '/edit') }}"><i class="fa fa-pencil"></i> Edit</a></td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <h2 class="text-center">Empty</h2>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
