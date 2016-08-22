<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                   aria-expanded="true" aria-controls="collapseOne">
                    Locations
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <div class="list-group">
                    <a href="/admin/locations"
                       class="list-group-item @if(Request::is('admin/locations')) active @endif"><i
                                class="fa fa-list-ol"></i> All</a>
                    <a href="/admin/locations/create"
                       class="list-group-item @if(Request::is('admin/locations/create')) active @endif"><i
                                class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                   aria-expanded="false" aria-controls="collapseTwo">
                    Land use
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div class="list-group">
                    <a href="/admin/land-uses"
                       class="list-group-item @if(Request::is('admin/land-uses')) active @endif"><i
                                class="fa fa-list-ol"></i> All</a>
                    <a href="/admin/land-uses/create"
                       class="list-group-item @if(Request::is('admin/land-uses/create')) active @endif"><i
                                class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                   aria-expanded="false" aria-controls="collapseThree">
                    Blocks
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
                <div class="list-group">
                    <a href="/admin/blocks"
                       class="list-group-item @if(Request::is('admin/blocks')) active @endif"><i
                                class="fa fa-list-ol"></i> All</a>
                    <a href="/admin/blocks/create"
                       class="list-group-item @if(Request::is('admin/blocks/create')) active @endif"><i
                                class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFour">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"
                   aria-expanded="true" aria-controls="collapseFour">
                    Plot Assignment
                </a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
                <div class="list-group">
                    <a href="/admin/plot-assignment"
                       class="list-group-item @if(Request::is('admin/plot-assignment')) active @endif"><i
                                class="fa fa-list-ol"></i> All</a>
                    <a href="/admin/plot-assignment/create"
                       class="list-group-item @if(Request::is('admin/plot-assignment/create')) active @endif"><i
                                class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
    </div>    
</div>