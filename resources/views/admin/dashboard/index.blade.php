@extends('layouts.admin')

@section('page_title', ' - Admin')

@section('nav_bar')

    @include('admin.common.nav_bar')

@endsection

@section('side_bar')

    @include('admin.common.nav_side_menu')

@endsection

@section('main_content')

    <ol class="breadcrumb">
        <li>
            <a href="/admin/dashboard">Nyumbani</a>
        </li>
        <li>
            Admin
        </li>
    </ol>

    <div class="row">
        <div class="col-xs-12">
            @if(Request::segment(1) == 'admin') in @endif
        </div>
    </div>

    <div class="row text-center">
        <div class="col-xs-12 col-sm-3">
            <div class="well">
                <small>Jumla ya Maeneo</small>
                <h2>10</h2>

            </div>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="well">
                <small>Jumla ya Matumizi ya ardhi</small>
                <h2>7</h2>

            </div>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="well">
                <small>Jumla ya Vitalu</small>
                <h2>15</h2>

            </div>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="well">
                <small>Jumla ya Viwanja</small>
                <h2>43</h2>

            </div>
        </div>
    </div>


@endsection