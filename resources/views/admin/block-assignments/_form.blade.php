<div class="form-group">
    <label for="area_id" class="col-sm-3 control-label">Location</label>
    <div class="col-sm-6">
        <select name="area_id" id="block_assignment_area_id" class="form-control">
            <option value="">-Select-</option>
            @foreach($locations as $location)
                <option value="{{ $location->area_id }}">{{ $location->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="block_assignment_areas_type_id" class="col-sm-3 control-label">Land use</label>
    <div class="col-sm-6">
        <select name="areas_type_id" id="block_assignment_areas_type_id" class="form-control">
            <div id="block_assignment_areas_type_id_div">
                <option value="">-Select Location First-</option>
            </div>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="block_id" class="col-sm-3 control-label">Block</label>
    <div class="col-sm-6">
        <select name="block_id" id="block_assignment_areas_type_id_div" class="form-control">
            <div id="block_assignment_block_id_div">
                <option value="">-Select Land use first-</option>
            </div>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="map" class="col-sm-3 control-label">Map</label>
    <div class="col-sm-6">
        <input type="file" name="file_name">
    </div>
</div>