@extends('layouts.app')

@section('page_title', 'Assign a Plot')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="/plot-assignment">Plots</a>
                    </li>
                    <li class="active">Assign</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h3 class="text-center">Plot Assignment</h3>

                <div class="well">

                    @include('common.errors')

                    {!! Form::open(['url' => 'plot-assignment', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include('plot-assignments._form')

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>

@endsection