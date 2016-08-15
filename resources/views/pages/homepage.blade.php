<!-- Header -->
<div class="container">
    <div style="padding-left: 5px;padding-right: 5px;padding-top: 20px;padding-bottom: 20px ">
        <h1>Welcome</h1>

        <p>This is the skeleton system of CDA plot acquisition system for cda dodoma. feel free to contribute.</p>

    </div>

    <div class="row">
        <div class="col-md-4 col-xs-6">
            <div class="bs-component">
                <div class="panel panel-default">
                    <div class="panel-heading">Areas</div>
                    <div class="panel-body" style="padding-left: 0;padding-right: 0">
                        <ul class="nav">
                            @foreach ($data['areas'] as $area)
                                <li><a href="javascript:void(0)">{{ $area['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-6">
            <div class="bs-component">
                <div class="panel panel-default">
                    <div class="panel-heading">Area type</div>
                    <div class="panel-body" style="padding-left: 0;padding-right: 0">
                        <ul class="nav">
                            @foreach ($data['area_types'] as $area_type)
                                <li><a href="javascript:void(0)">{{ $area_type['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-6">
            <div class="bs-component">
                <div class="panel panel-default">
                    <div class="panel-heading">Blocks</div>
                    <div class="panel-body" style="padding-left: 0;padding-right: 0">
                        <ul class="nav">
                            @foreach ($data['blocks'] as $block)
                                <li><a href="javascript:void(0)">{{ $block['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="bs-component">
                <div class="panel panel-default">
                    <div class="panel-heading">Plots</div>
                    <div class="panel-body">
                        This will show a list of all plots available in the database
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="bs-component">
                <div class="panel panel-default">
                    <div class="panel-heading">Map</div>
                    <div class="panel-body">
                        A map of the plots
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
