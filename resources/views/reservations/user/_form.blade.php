<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Personal Information</h3>
	</div>
	<div class="panel-body">
		<div class="form-group">
			<label for="first_name" class="col-sm-3 control-label">First Name</label>
			<div class="col-sm-9">
				{!! Form::text('first_name', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			<label for="middle_name" class="col-sm-3 control-label">Middle Name</label>
			<div class="col-sm-9">
				{!! Form::text('middle_name', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			<label for="last_name" class="col-sm-3 control-label">Last Name</label>
			<div class="col-sm-9">
				{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			<label for="photo" class="col-sm-3 control-label">Photo</label>
			<div class="col-sm-9">
				<div class="thumbnail">
					<img src="/img/uploads/avatars/{{ $user_detail->photo }}" class="img-responsive" alt="{{ $user_detail->first_name }}&nbsp;{{ $user_detail->middle_name }}&nbsp;{{ $user_detail->last_name }}">
				</div>
			</div>
		</div>		<div class="form-group">
			<label for="photo" class="col-sm-3 control-label">Change</label>
			<div class="col-sm-9">
				<input type="file" name="photo" value="{{ $user_detail->photo }}">
			</div>
		</div>		
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Contact Information</h3>
	</div>
	<div class="panel-body">
		<div class="form-group">
			<label for="phone_number" class="col-sm-3 control-label">Phone number</label>
			<div class="col-sm-9">
				{!! Form::text('phone_number', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
			</div>
		</div>
		<div class="form-group">
			<label for="email_address" class="col-sm-3 control-label">Email</label>
			<div class="col-sm-9">
				{!! Form::email('email_address', null, ['class' => 'form-control']) !!}
			</div>
		</div>	
		<div class="form-group">
			<label for="address" class="col-sm-3 control-label">Address</label>
			<div class="col-sm-9">
				{!! Form::textarea('address', null, ['class' => 'form-control']) !!}
			</div>
		</div>		
	</div>			
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Where are you?</h3>
	</div>
	<div class="panel-body">

		<div class="form-group">
			<label for="region" class="col-sm-3 control-label">Region</label>
			<div class="col-sm-9">
				{!! Form::text('region',null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			<label for="district" class="col-sm-3 control-label">District</label>
			<div class="col-sm-9">
				{!! Form::text('district',null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			<label for="ward" class="col-sm-3 control-label">Ward</label>
			<div class="col-sm-9">
				{!! Form::text('ward', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			<label for="house_number" class="col-sm-3 control-label">House number</label>
			<div class="col-sm-9">
				{!! Form::text('house_number', null, ['class' => 'form-control']) !!}
			</div>
		</div>	

	</div>
</div>
