<div class="form-group">
    <label for="area_id" class="col-sm-3 control-label">Location</label>
    <div class="col-sm-6">
        <select name="area_id" id="area_id" class="form-control">
            @foreach($locations as $location)
                <option value="{{ $location->area_id }}">{{ $location->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="areas_type_id" class="col-sm-3 control-label">Land use</label>
    <div class="col-sm-6">
        <select name="areas_type_id" id="areas_type_id" class="form-control">
            @foreach($land_uses as $land_use)
                <option value="{{ $land_use->areas_type_id }}">{{ $land_use->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="price" class="col-sm-3 control-label">Price</label>
    <div class="col-sm-6">
        <input type="text" name="price" id="price" class="form-control">
    </div>
</div>
