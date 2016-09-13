<div class="form-group">
    <label for="first_name" class="col-md-4 control-label">First Name</label>

    <div class="col-md-6">
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}

    </div>
</div>
<div class="form-group">
    <label for="middle_name" class="col-md-4 control-label">Middle Name</label>

    <div class="col-md-6">
        {!! Form::text('middle_name', null, ['class' => 'form-control']) !!}

    </div>
</div>
<div class="form-group">
    <label for="last_name" class="col-md-4 control-label">Last Name</label>

    <div class="col-md-6">
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}

    </div>
</div>
<div class="form-group">
    <label for="email_address" class="col-md-4 control-label">Email Address</label>

    <div class="col-md-6">
        {!! Form::email('email_address', null, ['class' => 'form-control']) !!}

    </div>
</div>
