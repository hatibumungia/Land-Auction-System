<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>CDA @yield('page_title')</title>

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    {{--<link href="/css/bootstrap.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/admin.css">
    <script src="/js/jquery-2.2.3.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

@yield('nav_bar')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            @yield('side_bar')
        </div>
        <div class="col-sm-8">

            <div class="row text-center">
                <div class="col-sm-6 col-sm-offset-3">
                    @if (session()->has('flash_notification.message'))
                        <div class="alert alert-{{ session('flash_notification.level') }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                            {!! session('flash_notification.message') !!}
                        </div>
                    @endif
                </div>


            </div>

            @yield('main_content')

        </div>
    </div>
</div>


<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/admin.js"></script>

</body>
</html>
