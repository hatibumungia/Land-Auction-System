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
   <!-- <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="/css/admin.css">
    <link href="/css/lightbox.css" rel="stylesheet">

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

        ul.dropdown-lr {
            width: 300px;
        }

        /* mobile fix */
        @media (max-width: 768px) {
            .dropdown-lr h3 {
                color: #eee;
            }

            .dropdown-lr label {
                color: #eee;
            }
        }
       
        #welcome{
            background: gray;
            color: white;
            width:100%;
            margin:0px auto 0px;
        }
    </style>

    <script src="/js/jquery.min.js"></script>

</head>
<body id="app-layout">

{{--Banner--}}
<div class="container">
    @include('../reservations/common/banner')
   <div class="row" id="welcome"><marquee scrollamount="2">KARIBU KATIKA MFUMO WA KUNUNUA VIWANJA KWA NJIA YA MTANDAO</marquee> </div>
    </div>
</div>
{{--//Banner--}}


{{--Navbar--}}
<div class="container">
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
                    DMC Plots
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if(Session::has('username'))
                        <li @if(Request::is('reservation')) class="active" @endif><a href="{{ url('/reservation') }}">Akaunti
                                Yangu</a>
                        </li>
                    @endif
                    {{--<li @if(Request::is('search')) class="active" @endif><a href="{{ url('/search') }}">Tafuta</a></li>--}}
                    @if(!Auth::guest())
                        <li><a href="/admin/dashboard">Dashboard</a></li>
                    @endif
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    @if(Session::has('username'))
                            <!-- Authentication Links -->
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
                    @else
                        <li><a href="{{ url('applicants/register') }}">Jisajili</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ingia <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-lr animated slideInRight" role="menu">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <h3><b>Ingia</b></h3>
                                    </div>

                                    @include('common.errors')

                                    {!! Form::open(['url' => '/applicants/auth/login']) !!}
                                    <div class="form-group">
                                        {!! Form::label('username', 'Namba ya Simu') !!}
                                        {!! Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('password', 'Neno la Siri') !!}
                                        {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-5 pull-right">
                                                <button type="submit" class="btn btn-primary"><i
                                                            class="fa fa-sign-in"></i> Ingia
                                                </button>
                                            </div>
                                            {!! Form::close() !!}
                                            <div class="col-xs-7">
                                                Hujajisajili? Jisajili <a href="/applicants/register"> hapa </a>.
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    @if (session()->has('flash_notification.message'))
        <div class="alert alert-{{ session('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {!! session('flash_notification.message') !!}
        </div>
    @endif

</div>
{{--//Notification--}}

@yield('content')


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="footer">
                <p class="text-center">DMC <i class="fa fa-copyright"></i> {{ date("Y") }} All Rights Reserved</p>
            </div>
        </div>
    </div>
</div>
        <!-- JavaScripts -->
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

<script src="{{ URL::to('js/reservation.js') }}"></script>
<script src="{{ URL::to('js/front-button-confirm.js') }}"></script>
<script src="/js/lightbox.js"></script>
<script src="/js/main.js"></script>

</body>
</html>
