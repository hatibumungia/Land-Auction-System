@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-1">
			<div class="page-header">
				<h1>Dashboard</h1>
			</div>
			<div class="well">
				<div class="">
					...
					{{-- Some quick tips for an admin --}}
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Plots <a href={{ url('plots/new') }}><span class="pull-right"><i class="fa fa-plus"></i></span></a></div>
				<div class="panel-body">
					<table class="table">
						<tr>
							<th>Plot #</th>
							<th>Size (sq. m)</th>
							<th>Location</th>
							<th>Type</th>
							<th>Price (TZS)</th>
						</tr>
						<tr>
							<td>201</td>
							<td>785</td>
							<td>Kisasa</td>
							<td>Residential</td>
							<td>2,700,000</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
    </div>
</div>
@endsection
