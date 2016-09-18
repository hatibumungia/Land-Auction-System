<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span
                            class="glyphicon glyphicon-folder-close">
                            </span>Content</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-book text-primary"></span><a
                                    href="{{ url('/reservation') }}">Reservations</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-pencil text-primary"></span><a
                                    href="{{ url('/reservation/complete-registration') }}">Complete Registration</a>
                        </td>
                    </tr>
                    {{--                    <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-flash text-success"></span><a
                                                        href="http://www.jquery2dotnet.com">News</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-file text-info"></span><a
                                                        href="http://www.jquery2dotnet.com">Newsletters</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-comment text-success"></span><a
                                                        href="http://www.jquery2dotnet.com">Comments</a>
                                                <span class="badge">42</span>
                                            </td>
                                        </tr>--}}
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span
                            class="glyphicon glyphicon-th">
                            </span>Modules</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <a href="http://www.jquery2dotnet.com">Orders</a> <span
                                    class="label label-success">$ 320</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.jquery2dotnet.com">Invoices</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.jquery2dotnet.com">Shipments</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.jquery2dotnet.com">Tex</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span
                            class="glyphicon glyphicon-user">
                            </span>Account</a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <a href="http://www.jquery2dotnet.com">Change Password</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.jquery2dotnet.com">Notifications</a> <span
                                    class="label label-info">5</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.jquery2dotnet.com">Import/Export</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-trash text-danger"></span><a
                                    href="http://www.jquery2dotnet.com" class="text-danger">
                                Delete Account</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span
                            class="glyphicon glyphicon-file">
                            </span>Reports</a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-usd"></span><a
                                    href="http://www.jquery2dotnet.com">Sales</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-user"></span><a href="{{ url('/reports/clients') }}">Clients</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-tasks"></span><a href="{{ url('/reports/reservations') }}">Reservations</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-shopping-cart"></span><a
                                    href="http://www.jquery2dotnet.com">Shopping Cart</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
{{--
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
                <img data-src="#" alt="Hakuna picha">
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
        <a href="{{ url('admin/roles') }}"
           class="list-group-item @if(Request::is('admin/roles')) active @endif">Roles</a>
        <a href="{{ url('admin/permissions') }}"
           class="list-group-item @if(Request::is('admin/permissions')) active @endif">Permissions</a>
        <a href="{{ url('admin/staff') }}"
           class="list-group-item @if(Request::is('admin/staff')) active @endif">Staff</a>
    </div>

    <div class="list-group">
        <a href="#" class="list-group-item"><i
                    class="fa fa-file-text-o"></i> Reports</a>
        <a href="{{ url('/reports/reservations/plots/'.\Carbon\Carbon::today().'/to/' . \Carbon\Carbon::now()) }}"
           target="_blank"
           class="list-group-item">Reservations</a>
        <a href="{{ url('reports/clients') }}"
           class="list-group-item @if(Request::is('reports/clients')) active @endif"><i
                    class="fa fa-users fa-fw"></i> Clients</a>
    </div>

@endif
--}}
