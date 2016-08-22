<div class="form-group">
    <label for="name" class="col-sm-3 control-label">Location</label>
    <div class="col-sm-6">

        <select name="area_id" id="area_id" class="form-control">
            @foreach($locations as $location)
                <option value="{{ $location->area_id }}">{{ $location->name }}</option>
            @endforeach
        </select>

    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-3 control-label">Land use</label>
    <div class="col-sm-6">

        <select name="area_id" id="area_id" class="form-control">
            @foreach($locations as $location)
                <option value="{{ $location->area_id }}">{{ $location->name }}</option>
            @endforeach
        </select>

    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-3 control-label">Price</label>
    <div class="col-sm-6">

        <select name="area_id" id="area_id" class="form-control">
            @foreach($locations as $location)
                <option value="{{ $location->area_id }}">{{ $location->name }}</option>
            @endforeach
        </select>

    </div>
</div>