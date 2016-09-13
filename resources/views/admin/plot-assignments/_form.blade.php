<div class="form-group">
    <label for="area_id" class="col-sm-3 control-label">Eneo</label>
    <div class="col-sm-6">
        <select name="area_id" id="plot_assignment_area_id" class="form-control">
            <option value="">-Chagua-</option>
            @foreach($areas as $area)

                <option value="{{ $area->area_id }}">{{ $area->name }}</option>

            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="areas_type_id" class="col-sm-3 control-label">Matumizi ya ardhi</label>
    <div class="col-sm-6">
      <select name="areas_type_id" id="areas_type_id" class="form-control">
        <option value="">-Chagua-</option>
        @foreach($area_types as $area_type)

            <option value="{{ $area_type->areas_type_id }}">{{ $area_type->name }}</option>

        @endforeach
      </select>
    </div>
</div>
<div class="form-group">
    <label for="block_id" class="col-sm-3 control-label">Kitalu</label>
    <div class="col-sm-6">
      <select name="block_id" id="block_id" class="form-control">
        <option value="">-Chagua-</option>
        @foreach($blocks as $block)

            <option value="{{ $block->block_id }}">{{ $block->name }}</option>

        @endforeach
      </select>
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-3 control-label"><i class="fa fa-file-excel-o"></i> Faili la ekseli</label>
    <div class="col-sm-6">

        {!! Form::file('user_file') !!}

        <p class="help-block">
            <a href="/plot-assignments/download-sample"><i class="fa fa-download">Pakua sampuli na uijaze kama itakavyo oneshwa.</i></a>
        </p>

    </div>
</div>
