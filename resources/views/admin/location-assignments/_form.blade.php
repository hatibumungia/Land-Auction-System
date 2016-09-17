<div class="form-group">
    <label for="area_id" class="col-sm-3 control-label">Area</label>
    <div class="col-sm-6">
        <select name="area_id" id="area_id" class="form-control">
            <option value="">-Select-</option>
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
            <div id="location_assignment_areas_type_id">
                <option value="">-Select area first-</option>
            </div>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="price" class="col-sm-3 control-label">Price per square meter (TZS)</label>
    <div class="col-sm-6">
        <input type="text" name="price" id="price" class="form-control">
    </div>
</div>
