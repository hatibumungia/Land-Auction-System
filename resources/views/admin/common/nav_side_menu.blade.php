<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span
                            class="glyphicon glyphicon-folder-close">
                            </span>Akaunti Yangu</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse @if(Request::segment(1) == 'reservation') in @endif">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-book text-primary"></span><a
                                    href="{{ url('/reservation') }}">Viwanja Vyangu</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-pencil text-primary"></span><a
                                    href="{{ url('/reservation/complete-registration') }}">Kamilisha Usajili</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @if($user->hasRole('admin'))
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span
                                class="glyphicon glyphicon-th">
                                </span>Admin</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse @if(Request::segment(1) == 'admin') in @endif">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td><a href="{{ url('/admin/dashboard') }}">Overview</a></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ url('/admin/locations') }}">Areas</a> <span
                                        class="label label-success floatSnan">{{ $totalLocations }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ url('/admin/land-uses') }}">Land uses</a> <span
                                        class="label label-success floatSnan">{{ $totalLandUses }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ url('/admin/blocks') }}">Blocks</a> <span
                                        class="label label-success floatSnan">{{ $totalBlocks }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ url('/admin/location-assignments') }}">Prices</a> <span
                                        class="label label-success floatSnan">{{ $totalPrices }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ url('/admin/location-images') }}">Area maps</a> <span
                                        class="label label-success floatSnan">{{ $totalAreaMaps }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ url('/admin/block-assignments') }}">Block Maps</a> <span
                                        class="label label-success floatSnan">{{ $totalBlockMaps }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ url('admin/plot-assignments') }}">Plots</a> <span
                                        class="label label-success floatSnan">{{ $totalPlots }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ url('admin/roles') }}">Roles</a> <span
                                        class="label label-success floatSnan">{{ $totalRoles }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ url('admin/permissions') }}">Permissions</a> <span
                                        class="label label-success floatSnan">{{ $totalPermissions }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ url('admin/staff') }}">Staff</a> <span
                                        class="label label-success floatSnan">{{ $totalStaff }}</span>
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
            <div id="collapseFour" class="panel-collapse collapse @if(Request::segment(1) == 'reports') in @endif">
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
    @endif
</div>
