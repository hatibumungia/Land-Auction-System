<div class="form-group">
    <label for="area_id" class="col-sm-3 control-label">Location</label>
    <div class="col-sm-9">
        <select name="area_id" id="area_id" class="form-control">
            @foreach($areas as $area)

                <option value="{{ $area->area_id }}">{{ $area->name }}</option>

            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="areas_type_id" class="col-sm-3 control-label">Land use</label>
    <div class="col-sm-9">
        <select name="areas_type_id" id="areas_type_id" class="form-control">
            @foreach($area_types as $area_type)

                <option value="{{ $area_type->areas_type_id }}">{{ $area_type->name }}</option>

            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="block_id" class="col-sm-3 control-label">Block</label>
    <div class="col-sm-9">
        <select name="block_id" id="block_id" class="form-control">
            @foreach($blocks as $block)

                <option value="{{ $block->block_id }}">{{ $block->name }}</option>

            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-3 control-label"><i class="fa fa-file-excel-o"></i> File</label>
    <div class="col-sm-9">

        {!! Form::file('user_file') !!}

        <p class="help-block">Choose a file with two colums which are Plot# and Size</p>

    </div>
</div>