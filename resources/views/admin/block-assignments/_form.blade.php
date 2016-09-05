<div class="form-group">
    <label for="area_id" class="col-sm-3 control-label">Eneo</label>
    <div class="col-sm-6">
        <select name="area_id" id="block_assignment_area_id" class="form-control">
            <option value="">-Chagua-</option>
            @foreach($locations as $location)
                <option value="{{ $location->area_id }}">{{ $location->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="block_assignment_areas_type_id" class="col-sm-3 control-label">Matumizi ya ardhi</label>
    <div class="col-sm-6">
        <select name="areas_type_id" id="block_assignment_areas_type_id" class="form-control">
            <div id="block_assignment_areas_type_id_div">
                <option value="">-Chagua eneo kwanza-</option>
            </div>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="block_id" class="col-sm-3 control-label">Kitalu</label>
    <div class="col-sm-6">
        <select name="block_id" id="block_assignment_areas_type_id_div" class="form-control">
            <div id="block_assignment_block_id_div">
                <option value="">-Chagua matumizi ya ardhi kwanza-</option>
            </div>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="map" class="col-sm-3 control-label">Ramani</label>
    <div class="col-sm-6">
        <input type="file" name="file_name">
    </div>
</div>