<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('page_title')</title>

    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    {{--<link href="/css/bootstrap.min.css" rel="stylesheet">--}}
    <style>
        body {
            font-family: "Times New Roman";
        }
        @media print {
            .container {
                width: auto;
            }
        }

        hr {
            border: solid 1.5px #000;
        }

        .contacts-div {
            background-color: #FF00CC;
            color: #FFF;
            padding: 6px 0 6px 0;
            margin: auto 0 auto 0;
        }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="/js/print/jspdf.js"></script>
    <script src="/js/from_html.js"></script>
    <script src="/js/print/jspdf.plugin.split_text_to_size.js"></script>
    <script src="/js/print/jspdf.plugin.standard_fonts_metrics.js"></script>

</head>
<body>

@yield('content')

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>

<!-- For printing purposes -->
</body>
</html>