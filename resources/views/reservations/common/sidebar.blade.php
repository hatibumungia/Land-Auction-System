<div class="list-group">
	<a href="/reservation" class="list-group-item"><h2>Menu</h2></a>
	<a href="/reservation" @if(Request::is('reservation')) class="list-group-item active" @endif  class="list-group-item">Viwanja vyako</a>
	<a href="/reservation/complete-registration" @if(Request::is('reservation/complete-registration')) class="list-group-item active" @endif  class="list-group-item">Kamilisha usajili</a>
	<a href="/reservation/logout" @if(Request::is('reservation/logout')) class="list-group-item active" @endif  class="list-group-item">Toka</a>
</div>