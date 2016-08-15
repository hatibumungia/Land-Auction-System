@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h1>Submit a plot</h1>
			<form action={{ url('plots/new') }} method="post">
				{!! csrf_field() !!}
				<div class="form-group">
					<label for="plot_no">Plot #</label>
					<input type="text" class="form-control" id="plot_no" name="plot_no" placeholder="Plot #">
				</div>
				<div class="form-group">
					<label for="size">Size (sq. m)</label>
					<input type="text" class="form-control" id="size" name="size" placeholder="Size (sq. m)">
				</div>
				<div class="form-group">
					<label for="location">Location</label>
					<input type="text" class="form-control" id="location" name="size" placeholder="Location">
				</div>
				<div class="form-group">
					<label for="type">Type</label>
					<input type="text" class="form-control" id="type" name="type" placeholder="Type">
				</div>
				<div class="form-group">
					<label for="price">Price</label>
					<input type="text" class="form-control" id="price" name="price" placeholder="Price">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
@endsection
