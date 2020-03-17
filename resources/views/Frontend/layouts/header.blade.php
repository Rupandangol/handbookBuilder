<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Document Builder</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">--}}

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
    <link rel="stylesheet" href="{{URL::to('frontendLib/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{URL::to('frontendLib/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{URL::to('frontendLib/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::to('frontendLib/owl.theme.css')}}">
    <link rel="stylesheet" href="{{URL::to('frontendLib/owl.transitions.css')}}">

    <link rel="stylesheet" href="{{URL::to('frontendLib/meanmenu/meanmenu.min.css')}}">

    <link rel="stylesheet" href="{{URL::to('frontendLib/animate.css')}}">

    <link rel="stylesheet" href="{{URL::to('frontendLib/normalize.css')}}">

    <link rel="stylesheet" href="{{URL::to('/frontendLib/bootstrap-select/bootstrap-select.css')}}">

    <link rel="stylesheet" href="{{URL::to('frontendLib/wave/waves.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('frontendLib/wave/button.css')}}">

    <link rel="stylesheet" href="{{URL::to('frontendLib/scrollbar/jquery.mCustomScrollbar.min.css')}}">

    <link rel="stylesheet" href="{{URL::to('frontendLib/notika-custom-icon.css')}}">

    <link rel="stylesheet" href="{{URL::to('frontendLib/main.css')}}">

    <link rel="stylesheet" href="{{URL::to('frontendLib/style.css')}}">

    <link rel="stylesheet" href="{{URL::to('frontendLib/responsive.css')}}">


    <link rel="stylesheet" href="{{URL::to('/frontendLib/css/dialog/dialog.css')}}">
    <link rel="stylesheet" href="{{URL::to('/frontendLib/css/dialog/sweetalert2.min.css')}}">
    <script src="{{URL::to('frontendLib/js/vendor/modernizr-2.8.3.min.js')}}" type=""></script>
    <style>
        #logoutColor:hover {
            text-shadow: 0 0 15px white;
        }
        #logoutColor, #msgColor{
            background-color: #3498db;


        }
        .mySubNavbar:hover {
            background-color: #c8d6e5;
            color: white;
        }
    </style>

    @yield('my-header')
</head>
