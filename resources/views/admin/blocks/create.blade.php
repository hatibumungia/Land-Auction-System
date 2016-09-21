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
            <h2>Add a new block</h2>
            <a href="{{ url('/admin/blocks') }}" class="btn btn-primary pull-right">View All</a>
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
                    <br><br>
                    @include('common.errors')

                    {!! Form::open(['url' => 'admin/blocks', 'class' => 'form-horizontal']) !!}

                    @include('admin.blocks._form')

                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Hifadhi</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection