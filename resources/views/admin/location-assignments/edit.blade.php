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

        <ol class="breadcrumb">
            <li>
                <a href="/admin/dashboard">Home</a>
            </li>
            <li>
                <a href="/admin/location-assignments">Gharama za maeneo</a>
            </li>
            <li class="active">Hariri</li>
        </ol>

        <h3>Hariri gharama za eneo</h3>
    </div>

    <div class="row">

        @include('common.errors')

        {!! Form::model($data, ['method' => 'PATCH', 'action' => ['Admin\AreaAssignmentController@update', $data['location'], $data['land_use']] , 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                <label for="area_id" class="col-sm-2 control-label">Location</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="area_id" id="area_id" value="{{ $data['location'] }}" disabled="disabled">
                    <input type="hidden" name="area_id" id="area_id" value="{{ $data['location'] }}">
                </div>
            </div>
            <div class="form-group">
                <label for="areas_type_id" class="col-sm-2 control-label">Land use</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="areas_type_id" id="areas_type_id" value="{{ $data['land_use'] }}" disabled="disabled">
                    <input type="hidden" name="areas_type_id" id="areas_type_id" value="{{ $data['land_use'] }}">
                </div>
            </div>
            <div class="form-group">
                <label for="price" class="col-sm-2 control-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="price" id="price" value="{{ $data['price'] }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                </div>
            </div>
        </form>

    </div>

@endsection