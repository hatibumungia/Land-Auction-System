<h3>Clock</h3>
<div class="list-group">
    <a href="/admin/dashboard"
       class="list-group-item"><h3><i class="fa fa-dashboard"></i> Admin Dashboard</h3></a>
    <a href="/admin/locations"
       class="list-group-item @if(Request::is('admin/locations')) active @endif"><i
                class="fa fa-angle-double-right"></i> Locations</a>
    <a href="/admin/land-uses"
       class="list-group-item @if(Request::is('admin/land-uses')) active @endif"><i
                class="fa fa-angle-double-right"></i> Land use</a>
    <a href="/admin/blocks"
       class="list-group-item @if(Request::is('admin/blocks')) active @endif"><i
                class="fa fa-angle-double-right"></i> Blocks</a>
    <a href="/admin/location-assignments"
       class="list-group-item @if(Request::is('admin/location-assignments')) active @endif"><i
                class="fa fa-angle-double-right"></i> Land use Assignment</a>
    <a href="/admin/block-assignments"
       class="list-group-item @if(Request::is('admin/block-assignments')) active @endif"><i
                class="fa fa-angle-double-right"></i> Block Assignments</a>
    <a href="/admin/plot-assignments"
       class="list-group-item @if(Request::is('admin/plot-assignments')) active @endif"><i
                class="fa fa-angle-double-right"></i> Plot Assignment</a>
</div>