<div class="form-group">
    <label for="name" class="col-sm-3 control-label">Eneo</label>
    <div class="col-sm-6">
        <select name="area_id" class="form-control">
            <option value="">-Chagua-</option>
            @foreach($areas as $area)
                <option value="{{ $area->area_id }}">{{ $area->name  }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-3 control-label">Ramani</label>
    <div class="col-sm-6">
        <input type="file" name="file_name">
    </div>
</div>
