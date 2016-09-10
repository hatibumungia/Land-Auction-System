<div class="list-group">
    <a href="{{ url('reports/reservations') }}"
       class="list-group-item @if(Request::is('reports/reservations')) active @endif"><i
                class="fa fa-folder-open-o fa-fw"></i> Reservations</a>
    <a href="{{ url('reports/clients') }}" class="list-group-item @if(Request::is('reports/clients')) active @endif"><i
                class="fa fa-users fa-fw"></i> Clients</a>
    <a href="#" class="list-group-item">Item 3</a>
</div>