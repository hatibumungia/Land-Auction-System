

<div class="form-group">
    <label for="area_id" class="col-sm-3 control-label">choose to publish</label>
    <div class="col-sm-6">
        <select name="area_id" id="ploot_assignment_area_id">
            <option value="">-Chagua-</option>
            @foreach($areas as $area)

                <option value="{{ $area->area_id }}">{{ $area->name }}</option>

            @endforeach
        </select>
   
        <select name="areas_type_id" id="ploot_assignment_areas_type_id">
            <option value="">-Chagua-</option>
        </select>
        <select name="block_id" id="ploot_assignment_block_id">
            <option value="">-Chagua-</option>
        </select>

        <button type="submit" class="btn btn-primary">Publish</button>
{!! Form::close() !!}
    </div>
</div>

