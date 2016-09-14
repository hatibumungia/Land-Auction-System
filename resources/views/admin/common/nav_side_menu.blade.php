<!-- All -->
<div class="list-group">
    <a href="#" class="list-group-item">
        @if(isset($user->photo))
            <div class="thumbnail">
                <img src="/img/uploads/avatars/{{ $user->photo }}" width="100" height="100" alt="Photo">
                <div class="caption">
                    <h4>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</h4>
                </div>
            </div>
        @else
            <div class="thumbnail">
                <img data-src="#" alt="No Photo">
            </div>
        @endif
    </a>
    <a href="/reservation" @if(Request::is('reservation')) class="list-group-item active"
       @endif  class="list-group-item">Viwanja vyako</a>
    <a href="/reservation/complete-registration"
       @if(Request::is('reservation/complete-registration')) class="list-group-item active"
       @endif  class="list-group-item">Kamilisha usajili</a>
</div>
<!-- //All -->

@if($user->hasRole('admin'))

    <div class="list-group">
        <a href="/admin/dashboard"
           class="list-group-item"><i class="fa fa-dashboard"></i> Admin</a>
        <a href="/admin/locations"
           class="list-group-item @if(Request::is('admin/locations')) active @endif">Maeneo</a>
        <a href="/admin/location-images"
           class="list-group-item @if(Request::is('admin/location-images')) active @endif">Ramani za maeneo</a>
        <a href="/admin/land-uses"
           class="list-group-item @if(Request::is('admin/land-uses')) active @endif">Matumizi ya ardhi</a>
        <a href="/admin/blocks"
           class="list-group-item @if(Request::is('admin/blocks')) active @endif">Vitalu</a>
        <a href="/admin/location-assignments"
           class="list-group-item @if(Request::is('admin/location-assignments')) active @endif">Gharama za Maeneo</a>
        <a href="/admin/block-assignments"
           class="list-group-item @if(Request::is('admin/block-assignments')) active @endif">Ramani za Vitalu</a>
        <a href="/admin/plot-assignments"
           class="list-group-item @if(Request::is('admin/plot-assignments')) active @endif">Viwanja</a>
    </div>


    <div class="list-group">
        <a href="{{ url('admin/roles') }}" class="list-group-item @if(Request::is('admin/roles')) active @endif">Roles</a>
        <a href="{{ url('admin/permissions') }}"
           class="list-group-item @if(Request::is('admin/permissions')) active @endif">Permissions</a>
        <a href="{{ url('admin/staff') }}" class="list-group-item @if(Request::is('admin/staff')) active @endif">Staff</a>
    </div>

    <div class="list-group">
        <a href="#" class="list-group-item"><i
                    class="fa fa-file-text-o"></i> Reports</a>
        <a href="{{ url('reports/reservations') }}"
           class="list-group-item @if(Request::is('reports/reservations')) active @endif"><i
                    class="fa fa-folder-open-o fa-fw"></i> Reservations</a>
        <a href="{{ url('reports/clients') }}" class="list-group-item @if(Request::is('reports/clients')) active @endif"><i
                    class="fa fa-users fa-fw"></i> Clients</a>
        <a href="#" class="list-group-item">Item 3</a>
    </div>

@endif
