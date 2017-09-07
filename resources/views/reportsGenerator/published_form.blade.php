<div class="form-group">
    <label for="area_id" class="col-sm-3 control-label">choose to publish</label>
    <div class="col-sm-6">

        <select name="reserved" id="reserved" required>
            <option value="">-Chagua-</option>
            <option value="1">published</option>
            <option value="0">Unpublished</option>
        </select>
        <select name="area_id" id="plot_assiignment_area_id">
            <option value="">-Chagua-</option>
            @foreach($areas as $area)

                <option value="{{ $area->area_id }}">{{ $area->name }}</option>

            @endforeach
        </select>
   
        <select name="areas_type_id" id="plot_assiignment_areas_type_id">
            <option value="">-Chagua-</option>
        </select>
        <select name="block_id" id="plot_assiignment_block_id">
            <option value="">-Chagua-</option>
        </select>

        <button type="submit" name="excel" value="excel" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel</button>

        <button type="submit" name="excel" value="pdf" class="btn btn-warning"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</button>
{!! Form::close() !!}
    </div>
</div>