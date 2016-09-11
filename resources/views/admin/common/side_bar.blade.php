<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-dashboard"></i> Admin</h3>
    </div>
    <div class="panel-body">
        <div class="list-group">
            <a href="{{ url('admin/roles') }}" class="list-group-item @if(Request::is('admin/roles')) active @endif">Roles</a>
            <a href="{{ url('admin/permissions') }}" class="list-group-item @if(Request::is('admin/permissions')) active @endif">Permissions</a>
            <a href="{{ url('admin/staff') }}" class="list-group-item @if(Request::is('admin/staff')) active @endif">Staff</a>
        </div>
    </div>
</div>
