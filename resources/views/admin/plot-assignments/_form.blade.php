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
        <select name="areas_type_id" id="plot_assignment_areas_type_id" class="form-control">
            <option value="">-Chagua eneo kwanza-</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="block_id" class="col-sm-3 control-label">Kitalu</label>
    <div class="col-sm-6">
        <select name="block_id" id="plot_assignment_block_id" class="form-control">
            <option value="">-Chagua matumizi ya ardhi kwanza-</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-3 control-label"><i class="fa fa-file-excel-o"></i> Faili la ekseli</label>
    <div class="col-sm-6">

        {!! Form::file('user_file') !!}

        <p class="help-block">
            <a href="/plot-assignments/download-sample"><i class="fa fa-download"> Pakua sampuli na uijaze kama ilivyo
                    onyeshwa.</i></a>
        </p>

    </div>
</div>
