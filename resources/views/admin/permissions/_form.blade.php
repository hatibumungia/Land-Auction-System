{{--<div class="form-group">
    <label for="name" class="col-sm-3 control-label">Name</label>
    <div class="col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>--}}
<div class="form-group">
    <label for="display_name" class="col-sm-3 control-label">Permission Name * </label>
    <div class="col-sm-9">
        {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label for="description" class="col-sm-3 control-label">Description (Option)</label>
    <div class="col-sm-9">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>