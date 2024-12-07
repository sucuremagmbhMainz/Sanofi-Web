<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$page_title}}</title>
    <link rel="shortcut icon" href="{{ URL::to('static_resources/mobile/images/favicon.ico')}}" type="image/x-icon" />
    <meta name="description" content="{{$meta_description}}">
    <meta name="keywords" content="{{$keywords}}"/>
    <meta name="og:title" content="{{$page_title}}">
    <meta name="og:description" content="{{$meta_description}}">
    <meta name="og:image" content="{{ URL::to('/static_resources/mobile/images/main-menu/Dulcolax_Sortiment.png')}}">
    <script>document.cookie = 'resolution=' + Math.max(screen.width, screen.height) + ("devicePixelRatio" in window ? "," + devicePixelRatio : ",1") + '; path=/';</script>
    <link rel="canonical" href="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    @section('styles')
    {{HTML::style("/static_resources/mobile/css/font-awesome.min.css")}}
    {{HTML::style("/static_resources/mobile/css/jquery-ui.css")}}
    {{HTML::style("/static_resources/mobile/css/main.min.css")}}
    @show
    <!--[if IE]>
    {{HTML::style("/static_resources/mobile/css/ie9.css")}}
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if IE 8]>{{HTML::style("/static_resources/mobile/css/ie8.css")}}<![endif]-->
    <script type="text/JavaScript" async="" src="https://datenschutz.sanofi.de/script/dulcolax.de/base.js"></script>
    {{HTML::script("/static_resources/mobile/js/main.min.js")}}
    {{HTML::script("/static_resources/mobile/js/its.js")}}
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- OneTrust Cookie-Einwilligungshinweis – Ende -->
</head>