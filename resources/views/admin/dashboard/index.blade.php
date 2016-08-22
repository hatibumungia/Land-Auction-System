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
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Link</a>
        </li>
        <li class="active">Current</li>
    </ol>

    <div class="row text-center">
        <div class="col-xs-12 col-sm-3">
            <div class="well">
                <h2>10</h2>
                <small>Locations</small>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="well">
                <h2>7</h2>
                <small>Land uses</small>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="well">
                <h2>15</h2>
                <small>Blocks</small>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="well">
                <h2>43</h2>
                <small>Plots</small>
            </div>
        </div>
    </div>

@endsection