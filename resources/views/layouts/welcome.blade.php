<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Agency - Start Bootstrap Theme</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap Material Design -->
    <link href="{{ URL::asset('css/bootstrap-material-design.css') }}" rel="stylesheet">

</head>
<body id="page-top" class="index">

@include('layouts.partials._navigation')

@include('pages.homepage')

@yield('content')

@include('layouts.partials._footer')

</body>
</html>