<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/favicon.ico">

    <title>DMC Plots &middot; @yield('page_title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link href="/css/zoom.css" rel="stylesheet">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style type="text/css">
        body {
            padding: 0 0;
            margin: 0 0;
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

    <script src="/js/jquery.min.js"></script>

</head>
<body id="app-layout">


{{--Navbar--}}
<div class="container-fluid">
    <nav id="admin-nav" class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
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
                    @if(Session::has('username'))
                        <li @if(Request::is('reservation')) class="active" @endif><a href="{{ url('/reservation') }}">Akaunti Yangu</a>
                        </li>
                    @endif
                    {{--<li @if(Request::is('search')) class="active" @endif><a href="{{ url('/search') }}">Tafuta</a></li>--}}
                </ul>

                {{--
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                --}}

                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (!Session::has('username'))
                        <li @if(Request::is('applicants/login')) class="active" @endif><a
                                    href="{{ url('/applicants/login') }}">Ingia</a></li>
                        <li @if(Request::is('applicants/register')) class="active" @endif><a
                                    href="{{ url('/applicants/register') }}">Jisajili</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Session::get('username') }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/reservation/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Toka</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>


            </div>
        </div>
    </nav>
</div>
{{--//Navbar--}}

{{--Notification--}}
<div class="container text-center">

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            @if (session()->has('flash_notification.message'))
                <div class="alert alert-{{ session('flash_notification.level') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    {!! session('flash_notification.message') !!}
                </div>
            @endif
        </div>
    </div>

</div>
{{--//Notification--}}

@yield('content')

        <!-- JavaScripts -->
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

<script src="{{ URL::to('js/reservation.js') }}"></script>
<script src="{{ URL::to('js/front-button-confirm.js') }}"></script>
<script src="/js/zoom.js"></script>

</body>
</html>
