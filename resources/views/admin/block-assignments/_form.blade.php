<div class="form-group">
    <label for="area_id" class="col-sm-3 control-label">Location</label>
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
            <option value="">-Select-</option>
            @foreach($land_uses as $land_use)
                <option value="{{ $land_use->areas_type_id }}">{{ $land_use->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="block_id" class="col-sm-3 control-label">Block</label>
    <div class="col-sm-6">
        <select name="block_id" id="block_id" class="form-control">
            <option value="">-Select-</option>
            @foreach($blocks as $block)
                <option value="{{ $block->block_id }}">{{ $block->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="map" class="col-sm-3 control-label">Map</label>
    <div class="col-sm-6">
        <input type="file" name="file_name">
    </div>
</div>