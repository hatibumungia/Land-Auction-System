<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CDA Plots &middot; @yield('page_title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/jquery.dataTables.min.css">
    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

	<style type="text/css">
        body{
            padding:0 0;
            margin:0 0; 
            font-family: 'OpenSans-Regular';

        }
		li.list-group-item:hover,
		li.list-group-item:focus,
		li.list-group-item.active {
			background-color: #337ab7;
			border-color: #337ab7;
			color: #fff;
		}

	</style>

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    CDA Plots
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/search') }}">Search</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                    @else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								{{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/search.js"></script>
    <script src="/js/bootstrap.min.js"></script>
	<script src="/js/jquery.dataTables.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

	<script>
		var areaListView = $('#areaListView');
		var areaTypeListView = $('#areaTypeListView');
		var blockListView = $('#blockListView');
		var plotPanel = $('#plotPanel');
		var sitePlanPanel = $('#sitePlanPanel');

		$(document).ready(function(){
			areaTypeListView.find('li').hide();
			blockListView.find('li').hide();
			plotPanel.hide();
			sitePlanPanel.hide();

			$('#plotDataTable').DataTable();

		});

		areaListView.find('li').on('click', function() {
			var areaListItem = $(this);

			areaId = areaListItem.data('area-id');
            var url = "http://localhost:8080/search/getAreaType";
            $.get(url,{area_id:areaId},function (data,status){
                console.log("json received = "+data);

                var jsonData = JSON.parse(data);
                areaTypeListView.find('li').hide();
                blockListView.find('li').hide();
                plotPanel.hide();
                sitePlanPanel.hide();

                for (var i = 0; i < jsonData.length; i++) {
                    var counter = jsonData[i];
                    console.log(counter.name);
                    $('#areaTypeListView').find('li').eq(counter.areas_type_id).show();
                }
            });

		});

		areaTypeListView.find('li').on('click', function() {
			var areaTypeListItem = $(this);

            area_type_id = areaTypeListItem.data('area-type-id');
			console.log("area_id: " + areaId);
            console.log("area_type_id: " + area_type_id);

            var url = "http://localhost:8080/search/getBlock";
            $.get(url,{area_id:areaId, area_type_id:area_type_id},function (data,status){
                console.log("json received = "+data);

                var jsonData = JSON.parse(data);
                blockListView.find('li').hide();
                plotPanel.hide();
                sitePlanPanel.hide();

                for (var i = 0; i < jsonData.length; i++) {
                    var counter = jsonData[i];
                    console.log(counter.name);
                    $('#blockListView').find('li').eq(counter.block_id).show();
                }
            });

		});

		blockListView.find('li').on('click', function() {
            var blockListItem = $(this);
            block_id = blockListItem.data('block-id');
            console.log("clicked block id = "+block_id);

			plotPanel.show();
			sitePlanPanel.show();


            var url = "http://localhost:8080/search/getPlot";
            $.get(url,{area_id:areaId, area_type_id:area_type_id,block_id:block_id},function (data,status){
                console.log("json received = "+data);

                var jsonData = JSON.parse(data);
                plotPanel.hide();
                plotPanel.show();

                var html = "";

                html += "<div class='panel-heading'><h3 class='panel-title'>Plots</h3></div><ul class='list-group'><table id='plotDataTable' class='table table-hover display' cellspacing='0' width='100%'><thead><tr><th>Plot #</th><th>Size (sq. m)</th><th>Price (TZS)</th></tr></thead><tbody>";


                for (var i = 0; i < jsonData.length; i++) {
                    var counter = jsonData[i];
                     html += "<tr>";
                        html += "<td>"+ counter.plot_no +"</td>";
                        html += "<td>"+ counter.size +"</td>";
                        html += "<td>"+ counter.size*counter.price+"</td>";
                    html += "</tr>";

                }
                
                html += "</tbody></table></ul>";
                
                $("#plotPanel").html(html);
            });

		});



	</script>
</body>
</html>
